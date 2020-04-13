<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsResult()
    {
        $doctor = new Doctor('Green');

        $this->assertEquals('Dr. Green', $doctor->getNameAndTitle());
    }

    public function testNamedAndTitleIncludesValueFromGetTitle()
    {
        // one variant
        // $mock = $this->getMockForAbstractClass(AbstractPerson::class);

        // second variant
        $mock = $this->getMockBuilder(AbstractPerson::class)
                ->setConstructorArgs(['Green'])
                ->getMockForAbstractClass();
        // with this approach we will have all abstrack method mocked

        $mock->method('getTitle')
            ->willReturn('Dr.');
            
        $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
        

    }
}