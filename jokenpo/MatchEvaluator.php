<?php

class MatchEvaluator
{
    protected $playerOne;
    protected $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function getPlayers()
    {
        return [$this->playerOne, $this->playerTwo];
    }

    public function play()
    {
        $playerOneMoveName = $this->playerOne->getMove()->getMoveName();
        $playerTwoMoveName = $this->playerTwo->getMove()->getMoveName();

        if ($playerOneMoveName === $playerTwoMoveName) {
            return null;
        }

        if ($playerOneMoveName === 'rock' && $playerTwoMoveName === 'scissors')
        {
            return $this->playerOne;
        }

        if ($playerOneMoveName === 'scissors' && $playerTwoMoveName === 'paper')
        {
            return $this->playerOne;
        }

        if ($playerOneMoveName === 'paper' && $playerTwoMoveName === 'rock')
        {
            return $this->playerOne;
        }

        return $this->playerTwo;
    }
}
