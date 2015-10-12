<?php

namespace App;

class NoPlayer implements Player
{
    public function getName()
    {
        throw new \Exception('This player has no name.');
    }

    public function getMove()
    {
        throw new \Exception('This player has no move.');
    }
}
