<?php
include "functions.php";

$playerName = 'Gigel';
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
        if ($_COOKIE[$playerName] == 10) {
            endOfGameAllPlayers($playerName, $player2Name);
            playerWins();
            $query = "UPDATE scor SET Player = 0";
            $query = "UPDATE scor SET Computer = 0";
            $q1 = $db->query($query);
        } else {
            $playerScore = incrementGameByOnePlayer($playerName);
            echo "Ai castigat runda! <br />";
            $query = "UPDATE scor SET Player = '$playerScore'";
            $q1 = $db->query($query);
        }
    } else {
        if ($_COOKIE[$player2Name] == 10) {
            endOfGameAllPlayers($playerName, $player2Name);
            computerWins();
            $query2 = "UPDATE scor SET Computer = 0";
            $query2 = "UPDATE scor SET Player = 0";
            $q2 = $db->query($query2);
        } else {
            $player2Score = incrementGameByOnePlayer($player2Name);
            echo "Calculatorul a castigat runda. <br />";
            $query2 = "UPDATE scor SET Computer = '$player2Score'";
            $q2 = $db->query($query2);
        }
    }
    echo $result;
    echo "<br />";
    echo "Player score: &nbsp" . $playerScore . "<br />";
    echo "Computer score: &nbsp" . $player2Score . "<br />";
}
?>