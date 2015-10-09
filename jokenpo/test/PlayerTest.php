<?php

require '../Player.php';
require '../Move.php';

class PlayerTest extends PHPUnit_Framework_TestCase
{
    private $playerLuis;
    private $moveRock;

    public function setUp()
    {
        $this->moveRock = new Move('rock');
        $this->playerLuis = new Player('Luis', $this->moveRock);
    }

    public function testPlayerShouldHaveNameAndMove()
    {
        $this->assertEquals('Luis', $this->playerLuis->getName());
        $this->assertEquals($this->moveRock, $this->playerLuis->getMove());
    }
}
