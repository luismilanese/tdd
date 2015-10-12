<?php

namespace App\Tests;

use App\Move;

class MoveTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldValidateGivenMove()
    {
        new Move('paper');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThrowExceptionUponInvalidArgument()
    {
        new Move('pin');
    }

    public function testShouldAcceptAnyWordCasing()
    {
        $rock = new Move('rOCk');
        $scissor = new Move('SCISSORS');
        $paper = new Move('paper');

        $this->assertEquals('rock', $rock->getMoveName());
        $this->assertEquals('scissors', $scissor->getMoveName());
        $this->assertEquals('paper', $paper->getMoveName());
    }
}
