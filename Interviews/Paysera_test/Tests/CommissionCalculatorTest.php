<?php

namespace Tests;

use App\CommissionCalculator;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;


class CommissionCalculatorTest extends TestCase
{
    private CommissionCalculator $calculator;
    private MockObject $mock;

    protected function setUp(): void
    {
        $this->calculator = new CommissionCalculator();
        $this->mock = $this->getMockBuilder(CommissionCalculator::class)
            ->onlyMethods(['getCountryCodeFromBin', 'getExchangeRate'])
            ->getMock();
    }

    public function testWorngInputData()
    {
        $this->expectException(Exception::class);
        $this->calculator->calculateCommission('', 0, '');

        $this->expectException(Exception::class);
        $this->calculator->calculateCommission('', 10, 'EUR');

        $this->expectException(Exception::class);
        $this->calculator->calculateCommission('45717360', 0, 'EUR');

        $this->expectException(Exception::class);
        $this->calculator->calculateCommission('45717360', 10, '');

        $this->expectException(Exception::class);
        $this->calculator->calculateCommission('457173603472384', 10, '');
    }

    public function testCalculateCommissionsFromFile()
    {
        $calculator = new CommissionCalculator();

        $this->assertEquals([], $calculator->calculateCommissionsFromFile('test.txt'));

        $calculator = new CommissionCalculator('httttps://failure.com');

        $this->expectException(Exception::class);
        $calculator->calculateCommissionsFromFile('input_test.txt');

        $calculator = new CommissionCalculator(null, 'httttps://failure.com');
        
        $this->expectException(Exception::class);
        $calculator->calculateCommissionsFromFile('ininput_testput.txt');

        $this->mock->method('getCountryCodeFromBin')
        ->willReturn('US');

        $this->mock->method('getExchangeRate')
            ->willReturn(1.5);

        $this->assertEquals([0.68], $this->mock->calculateCommissionsFromFile('input_test.txt'));
    }

    public function testCalculateCommissionNotEU()
    {
        $this->mock->method('getCountryCodeFromBin')
            ->willReturn('US');

        $this->mock->method('getExchangeRate')
            ->willReturn(1.5);

        $this->assertEquals(0.68, $this->mock->calculateCommission('4745030', 50.53, 'USD'));
    }

    public function testCalculateCommissionEU()
    {
        $this->mock->method('getCountryCodeFromBin')
            ->willReturn('DK');

        $this->mock->method('getExchangeRate')
            ->willReturn(1.5);

        $this->assertEquals(0.51, $this->mock->calculateCommission('45717360', 50.53, 'EUR'));

    }

    public function testCalculateCommissionWithoutRateNotEU()
    {
        $this->mock->method('getCountryCodeFromBin')
        ->willReturn('US');

        $this->mock->method('getExchangeRate')
            ->willReturn(0.0);

        $this->assertEquals(1.02, $this->mock->calculateCommission('4745030', 50.53, 'USD'));
    }

    public function testCalculateCommissionWithoutRateEU()
    {
        $this->mock->method('getCountryCodeFromBin')
            ->willReturn('DK');

        $this->mock->method('getExchangeRate')
            ->willReturn(0.0);

        $this->assertEquals(0.51, $this->mock->calculateCommission('45717360', 50.53, 'EUR'));
    }
}
