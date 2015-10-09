<?php

class Move
{
    private $avaliableMoves = ['scissors', 'rock', 'paper'];
    private $moveName;

    public function __construct($moveName)
    {
        $moveName = strtolower($moveName);
        if (!in_array($moveName, $this->avaliableMoves)) {
            throw new InvalidArgumentException("Move should be: scissors, rock or paper. Value given = " . $moveName);
        }
        $this->moveName = $moveName;
    }

    public function getMoveName()
    {
        return $this->moveName;
    }
}
