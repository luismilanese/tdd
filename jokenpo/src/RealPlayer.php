<?php

namespace App;

class RealPlayer implements Player
{
    private $name;
    private $move;

    public function __construct($name, Move $move)
    {
        $this->move = $move;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMove()
    {
        return $this->move;
    }
}
