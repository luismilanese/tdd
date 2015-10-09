<?php

require_once 'MatchEvaluator.php';
require_once 'Player.php';
require_once 'Move.php';

$numberOfMatches = isset($argv[1]) ? (int) $argv[1] : 3;
$moves = ['rock', 'scissors', 'paper'];

$playerOneWins = 0;
$playerTwoWins = 0;
$draws = 0;

for($i = 0; $i < $numberOfMatches; $i++) {
    $randomKey = array_rand($moves, 2);

    $playerOne = new Player("Player One", new Move($moves[rand(0, 2)]));
    $playerTwo = new Player("Player Two", new Move($moves[rand(0, 2)]));    

    $match = new MatchEvaluator($playerOne, $playerTwo);
    $winner = $match->play();

    if ($winner === $playerOne)
        $playerOneWins++;
    elseif ($winner === $playerTwo)
        $playerTwoWins++;
    else
        $draws++;

    if (is_null($winner)) {
        echo "Draw\n";
        continue;
    }

    echo sprintf(
        "%s plays %s. %s plays %s. %s wins",
        $playerOne->getName(),
        $playerOne->getMove()->getMoveName(),
        $playerTwo->getName(),
        $playerTwo->getMove()->getMoveName(),
        $winner->getName()
    ) . "\n";
}

echo "\n\nResult\n\n";
echo sprintf("%s won %s match(es).\n%s won %s match(es).\n%s draws\n", $playerOne->getName(), $playerOneWins, $playerTwo->getName(), $playerTwoWins, $draws);

if ($playerOneWins > $playerTwoWins) {
    echo $playerOne->getName() . " is the big winner.\n";
} else if ($playerOneWins < $playerTwoWins) {
    echo $playerTwo->getName() . " is the big winner.\n";
} else {
    echo "We have a draw.\n";
}