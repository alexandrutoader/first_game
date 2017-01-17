<?php
include "functions.php";

if (isset($_GET['choice'])) {
    $player = $_GET['choice'];
    $options = array(
        1 => 'hartie',
        2 => 'piatra',
        3 => 'foarfeca'
    );
    $random = rand(1, 3);
    $player2 = $options[$random];
    $result = "Ai ales $player, iar calculatorul a ales $player2<br />";
    if ($player == $player2) {
        echo "Egalitate! Amandoi ati ales &nbsp" . ucfirst($player) . "<br />";
    } elseif (($player == $options[1] && $player2 == $options[2]) ||
        ($player == $options[2] && $player2 == $options[3]) ||
        ($player == $options[3] && $player2 == $options[1])
    ) {
        echo "Ai castigat runda! <br />";
        if ($_COOKIE[$player] == 10) {
            playerWins();
            endOfGameAllPlayers($player, $player2);
        } else {
            incrementGameByOnePlayer($player);
        }
    } else {
        echo "Calculatorul a castigat runda. <br />";
        if ($_COOKIE[$player2] == 10) {
            computerWins();
            endOfGameAllPlayers($player, $player2);
        } else {
            incrementGameByOneComputer($player2);
        }
    }
    echo $result;
    echo "<br />";
    echo "Player score: &nbsp" . $_COOKIE[$player] . "<br />";
    echo "Computer score: &nbsp" . $_COOKIE[$player2] . "<br />";
}
?>