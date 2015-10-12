<?php

require_once '../NoPlayer.php';
require_once '../Player.php';

class NoPlayerTest extends PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('Player', $this->noPlayer);
    }
}
