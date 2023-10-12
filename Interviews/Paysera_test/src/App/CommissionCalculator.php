<?php

namespace App;

use Exception;
use GuzzleHttp\Client;

class CommissionCalculator
{
    private const AMOUNT = 'amount';
    private const BIN = 'bin';
    private const CURRENCY = 'currency';

    private string $binProviderUrl = 'https://lookup.binlist.net/';
    private string $currencyRatesProviderUrl = 'https://api.exchangeratesapi.io/latest';

    public function __construct(?string $binProviderUrl = null, ?string $currencyRatesProviderUrl = null)
    {
        if ($binProviderUrl) {
            $this->binProviderUrl = $binProviderUrl;
        }

        if ($currencyRatesProviderUrl) {
            $this->currencyRatesProviderUrl = $currencyRatesProviderUrl;
        }
    }

    /**
     * @throws Exception 
     */
    public function calculateCommissionsFromFile(?string $file): array
    {        
        $rows = explode("\n", @file_get_contents($file));
        $commissions = [];

        foreach ($rows as $row) {
            if (empty($row)) continue;

            $transaction = json_decode($row, true);
            $amount = (float) ($transaction[self::AMOUNT] ?? 0);
            $bin = $transaction[self::BIN] ?? '';
            $currency = $transaction[self::CURRENCY] ?? '';

            if (empty($amount) || empty($bin) || empty($currency)) {
                throw new Exception("Incorrect data in {$row}");
            }

            $commissions[] = $this->calculateCommission($bin, $amount, $currency);
        }

        return $commissions;
    }

    /**
     * @throws Exception
     */
    public function calculateCommission(string $bin, float $amount, string $currency): float
    {
        $countryCode = $this->getCountryCodeFromBin($bin);
        
        if (empty($countryCode)) {
            throw new Exception("Impossible to get country code for {$bin}");
        }

        $amntFixed = $this->fixAmount($amount, $currency);
        return  $this->calculate($amntFixed, $countryCode);
    }

    /**
     * @throws Exception
     */
    public function getExchangeRate(string $currency): float
    {
        $client = new Client();
        $response = $client->get($this->currencyRatesProviderUrl);
        $data = json_decode($response->getBody(), true);
        
        return (float)($data['rates'][$currency] ?? 0.0);
    }

    /**
     * @throws Exception
     */
    public function getCountryCodeFromBin(string $bin): string
    {
        $client = new Client();
        $response = $client->get($this->binProviderUrl.$bin);
        $data = json_decode($response->getBody());

        return $data->country->alpha2 ?? '';
    }

    private function isEuCountry(?string $countryCode): bool
    {
        $euCountries = [
            'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GR', 'HR', 'HU',
            'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK',
        ];
        return in_array($countryCode, $euCountries);
    }

    private function fixAmount(float $amount, string $currency): float
    {
        $rate = $this->getExchangeRate($currency);
        $amount = (float) $amount;

        return $currency == 'EUR' || $rate == 0 ? $amount : $amount / $rate;
    }

    private function calculate (float $amount, string $countryCode): float
    {
        $commission = $amount * ($this->isEuCountry($countryCode) ? 0.01 : 0.02);

        return ceil($commission * 100) / 100;
    }
}
