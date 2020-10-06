<?php

use App\FileReader;
use PHPUnit\Framework\TestCase;

class FileReaderTest extends TestCase
{
    public function testConstructorFileReader(): void
    {
        $this->assertInstanceOf(FileReader::class, new FileReader(''));
    }

    public function testGetRowsMethod(): void
    {
        // correct string
        $fileReader = new FileReader('{"bin":"45717360","amount":"100.00","currency":"EUR"}');
        $this->assertEquals([
            ['bin' => 45717360, 'amount' => 100.00, 'currency' => 'EUR'],
        ], $fileReader->getRows());

        // first row correct and second one with mistake
        $fileReader = new FileReader('{"bin":"45717360","amount":"100.00","currency":"EUR"}' . "\n" .
        '{"bin":"516793a","amount":"50.00","currency":"USD"}');
        $this->assertEquals([
            ['bin' => 45717360, 'amount' => 100.00, 'currency' => 'EUR'],
        ], $fileReader->getRows());

        // mistake in bin key
        $fileReader = new FileReader('{"bi":"45717360","amount":"100.00","currency":"EUR"}');
        $this->assertEquals([], $fileReader->getRows());

        // mistake in bin value, only digits
        $fileReader = new FileReader('{"bin":"457a7360","amount":"100.00","currency":"EUR"}');
        $this->assertEquals([], $fileReader->getRows());

        // mistake in amount key
        $fileReader = new FileReader('{"bin":"45717360","amout":"100.00","currency":"EUR"}');
        $this->assertEquals([], $fileReader->getRows());

        // mistake in amount value, only digits and 1 dot
        $fileReader = new FileReader('{"bi":"45717360","amount":"100.a0","currency":"EUR"}');
        $this->assertEquals([], $fileReader->getRows());

        // mistake in currency key
        $fileReader = new FileReader('{"bi":"45717360","amount":"100.00","currency":"EUR"}');
        $this->assertEquals([], $fileReader->getRows());

        // mistake in currency value, only letters
        $fileReader = new FileReader('{"bi":"45717360","amount":"100.00","currency":"EU3"}');
        $this->assertEquals([], $fileReader->getRows());
    }
}