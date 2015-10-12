<?php

require '../RealPlayer.php';
require '../Move.php';

class RealPlayerTest extends PHPUnit_Framework_TestCase
{
    private $playerLuis;
    private $moveRock;

    public function setUp()
    {
        $this->moveRock = new Move('rock');
        $this->playerLuis = new RealPlayer('Luis', $this->moveRock);
    }

    public function testPlayerShouldHaveNameAndMove()
    {
        $this->assertEquals('Luis', $this->playerLuis->getName());
        $this->assertEquals($this->moveRock, $this->playerLuis->getMove());
    }

    public function testRealPlayerShouldBeAPlayer()
    {
        $this->assertInstanceOf('Player', $this->playerLuis);
    }
}
