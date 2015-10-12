<?php

namespace App\Tests;

use App\MatchEvaluator;
use App\RealPlayer;
use App\NoPlayer;
use App\Move;

class MatchEvaluatorTest extends \PHPUnit_Framework_TestCase
{
    private $matchEvaluator;
    private $playerOne;
    private $playerTwo;

    public function setUp()
    {
        $this->playerOne = new RealPlayer('Luis', new Move('rock'));
        $this->playerTwo = new RealPlayer('Milanese', new Move('paper'));

        $this->matchEvaluator = new MatchEvaluator($this->playerOne, $this->playerTwo);
    }

    public function testMatchShouldHaveTwoPlayersWithAMoveEach()
    {
        $players = $this->matchEvaluator->getPlayers();

        $this->assertEquals(2, count($players));
        $this->assertEquals('Luis', $players[0]->getName());
        $this->assertEquals('Milanese', $players[1]->getName());

        $this->assertEquals('rock', $players[0]->getMove()->getMoveName());
        $this->assertEquals('paper', $players[1]->getMove()->getMoveName());
    }

    public function testRockBeatsScissors()
    {
        $matchEvaluator = new MatchEvaluator(new RealPlayer('Harry', new Move('rock')), new RealPlayer('Houdini', new Move('scissors')));
        $winner = $matchEvaluator->play();

        $this->assertEquals('Harry', $winner->getName());
    }

    public function testScissorsBeatsPaper()
    {
        $matchEvaluator = new MatchEvaluator(new RealPlayer('Harry', new Move('paper')), new RealPlayer('Houdini', new Move('scissors')));
        $winner = $matchEvaluator->play();

        $this->assertEquals('Houdini', $winner->getName());
    }

    public function testPaperBeatsRock()
    {
        $matchEvaluator = new MatchEvaluator(new RealPlayer('Harry', new Move('paper')), new RealPlayer('Houdini', new Move('rock')));
        $winner = $matchEvaluator->play();

        $this->assertEquals('Harry', $winner->getName());
    }

    public function testEqualMovesResultsInDraw()
    {
        $matchEvaluator = new MatchEvaluator(new RealPlayer('Harry', new Move('paper')), new RealPlayer('Houdini', new Move('paper')));
        $winner = $matchEvaluator->play();

        $this->assertInstanceOf('App\NoPlayer', $winner, 'Should be an instance of NoPlayer.');
    }
}
