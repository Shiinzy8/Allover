<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Transaction
 * @package App
 */
class Transaction
{
    public static array $EUCountries = [
        'AT','BE','BG','CY','CZ','DE','DK','EE','ES','FI','FR','GR','HR','HU','IE','IT','LT','LU','LV','MT','NL','PO','PT','RO','SE','SI','SK'
    ];
    public static string $binlistAddress = 'https://lookup.binlist.net/';

    private int $bin;
    private float $amount;
    private float $commission;
    private string $country;
    private string $currency;

    public function __construct(int $bin, float $amount, string $currency)
    {
        $this->bin = $bin;
        $this->amount = $amount;
        $this->commission = 0.0;
        $this->currency = $currency;

        $client = new Client();
        try {
            $request = $client->request('GET', self::$binlistAddress . $this->bin);
        } catch (GuzzleException $e) {
            die('error!');
        }

        $result = json_decode($request->getBody(), true);
        $this->country = $result['country']['alpha2'] ?? '';

        if (empty($this->country)) {
            die('error!');
        }
    }

    public function calculateCommission(array $rates): void
    {
        $rate = $rates[$this->currency] ?? 0;
        $amntFixed = $rate > 0 ? $this->amount / $rate : $this->amount;

        if ($this->currency == 'EUR') {
            $amntFixed = $this->amount;
        }

        $this->commission = $amntFixed * (in_array($this->country, self::$EUCountries) ? 0.01 : 0.02);
    }

    public function getCommission(): float
    {
        return $this->commission;
    }

    public function getRoundCommission(int $round): float
    {
        $roundCommission = round($this->commission, $round);

        if ($roundCommission < $this->commission) {
            $roundCommission = $roundCommission + (1 / pow(10, $round));
        }

        return $roundCommission;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}