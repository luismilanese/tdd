<?php

require_once '../MatchEvaluator.php';
require_once '../Player.php';
require_once '../Move.php';

class MatchEvaluatorTest extends PHPUnit_Framework_TestCase
{
    private $matchEvaluator;
    private $playerOne;
    private $playerTwo;

    public function setUp()
    {
        $this->playerOne = new Player('Luis', new Move('rock'));
        $this->playerTwo = new Player('Milanese', new Move('paper'));

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
        $matchEvaluator = new MatchEvaluator(new Player('Harry', new Move('rock')), new Player('Houdini', new Move('scissors')));
        $winner = $matchEvaluator->play();

        $this->assertEquals('Harry', $winner->getName());
    }

    public function testScissorsBeatsPaper()
    {
        $matchEvaluator = new MatchEvaluator(new Player('Harry', new Move('paper')), new Player('Houdini', new Move('scissors')));
        $winner = $matchEvaluator->play();

        $this->assertEquals('Houdini', $winner->getName());
    }

    public function testPaperBeatsRock()
    {
        $matchEvaluator = new MatchEvaluator(new Player('Harry', new Move('paper')), new Player('Houdini', new Move('rock')));
        $winner = $matchEvaluator->play();

        $this->assertEquals('Harry', $winner->getName());
    }

    public function testEqualMovesResultsInDraw()
    {
        $matchEvaluator = new MatchEvaluator(new Player('Harry', new Move('paper')), new Player('Houdini', new Move('paper')));
        $winner = $matchEvaluator->play();

        $this->assertEquals(null, $winner);
    }
}
