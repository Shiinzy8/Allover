<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase 
{
    public function tearDown(): void 
    {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned() 
    {
        $service = $this->createMock(TemperatureService::class);

        $map = [
            ['12:00', 20],
            ['14:00', 26],
        ];

        $service->expects($this->exactly(2)) // method getTemperature will run 2 times
            ->method('getTemperature') // name of the method
            ->will($this->returnValueMap($map)); // the map of returned values
                // first attempt will return with argument of '12:00' and return 20
                // second attempt will return with argument of '14:00' and return 26

        $weather = new WeatherMonitor($service);

        // $weather->getAverageTemperature('12:00', '14:00');

        $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    }

    public function testCorrectAverageIsReturnedUsingMockery() 
    {
        $service = Mockery::mock(TemperatureService::class);

        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

        $weather = new WeatherMonitor($service);

        $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    }
}