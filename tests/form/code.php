<?php
include "functions.php";

$playerName = 'Gigiel';
$player2Name = 'Calculatorul';
$playerScore = initializePlayerScore($playerName);
$player2Score = initializePlayerScore($player2Name);
if (isset($_GET['choice'])) {
    $playerOption = $_GET['choice'];
    $options = array(
        1 => 'hartie',
        2 => 'piatra',
        3 => 'foarfeca'
    );
    $random = rand(1, 3);
    $player2Option = $options[$random];

    $result = "Ai ales $playerOption, iar calculatorul a ales $player2Option<br />";
    if ($playerOption == $player2Option) {
        echo "Egalitate! Amandoi ati ales &nbsp" . ucfirst($playerOption) . "<br />";
    } elseif (($playerOption == $options[1] && $player2Option == $options[2]) ||
        ($playerOption == $options[2] && $player2Option == $options[3]) ||
        ($playerOption == $options[3] && $player2Option == $options[1])
    ) {
        echo "Ai castigat runda! <br />";
        if ($_COOKIE[$playerName] == 10) {
            playerWins();
            endOfGameAllPlayers($playerName, $player2Name);
        } else {
            $playerScore = incrementGameByOnePlayer($playerName);
        }
    } else {
        echo "Calculatorul a castigat runda. <br />";
        if ($_COOKIE[$player2Name] == 10) {
            computerWins();
            endOfGameAllPlayers($playerName, $player2Name);
        } else {
            $player2Score = incrementGameByOnePlayer($player2Name);
        }
    }
    echo $result;
    echo "<br />";
    echo "Player score: &nbsp" . $playerScore . "<br />";
    echo "Computer score: &nbsp" . $player2Score . "<br />";
}
?>