<?php

namespace App\Tests;

use App\NoPlayer;
use App\Player;

class NoPlayerTest extends \PHPUnit_Framework_TestCase
{
    private $noPlayer;

    public function setUp()
    {
        $this->noPlayer = new NoPlayer();
    }

    /**
     * @expectedException Exception
     */
    public function testNoPlayerGetNameShouldFail()
    {
        $this->noPlayer->getName();
    }

    /**
     * @expectedException Exception
     */
    public function testNoPlayerGetMoveShouldFail()
    {
        $this->noPlayer->getMove();
    }

    public function testNoPlayerShouldBeAPlayer()
    {
        $this->assertInstanceOf('App\Player', $this->noPlayer);
    }
}
