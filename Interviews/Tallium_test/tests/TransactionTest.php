<?php

use App\Transaction;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testConstructorFileReader(): void
    {
        $transaction = new Transaction(45717360, 100.00, 'EUR');

        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertEquals('DK', $transaction->getCountry());
    }

    public function testCalculateCommission(): void
    {
        // card in EU
        $transaction = new Transaction(45717360, 100.00, 'EUR');
        $transaction->calculateCommission([]);


        $this->assertEquals('DK', $transaction->getCountry());
        $this->assertEquals(1, $transaction->getCommission());
        $this->assertEquals(1.00, $transaction->getRoundCommission(2));

        // card in EU rate > 0
        $transaction = new Transaction(40052445, 10000.00, 'CZK');
        $transaction->calculateCommission($rates = ["CZK" => 26.2]);

        $this->assertEquals('CZ', $transaction->getCountry());
        $this->assertEquals(3.816793893129771, $transaction->getCommission());
        $this->assertEquals(3.817, $transaction->getRoundCommission(3));

        // card in EU rate == 0
        $this->assertEquals('CZ', $transaction->getCountry());
        $transaction = new Transaction(40052445, 100.00, 'CZK');
        $transaction->calculateCommission([]);

        $this->assertEquals(1, $transaction->getCommission());

        // card not in EU rate > 0
        $transaction = new Transaction(45417360, 10000.00, 'JPY');
        $transaction->calculateCommission($rates = ["JPY" => 125.39]);

        $this->assertEquals('JP', $transaction->getCountry());
        $this->assertEquals(1.595023526597, $transaction->getCommission());
        $this->assertEquals(1.6, $transaction->getRoundCommission(2));

        // card not in EU rate == 0
        $transaction = new Transaction(45417360, 100.00, 'JPY');
        $transaction->calculateCommission([]);

        $this->assertEquals(2, $transaction->getCommission());
    }
}