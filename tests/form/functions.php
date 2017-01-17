<?php
function incrementGameByOnePlayer($player){
    $newPlayerScore = $_COOKIE[$player] + 1;
    setcookie($player, $newPlayerScore);
    return $newPlayerScore;
}

function playerWins(){
        echo "Felicitari! Ai castigat! <br />";
        echo "<br/>";
        echo "Jocul s-a terminat! Click pe 'Joaca din nou' pentru a incepe un nou joc! <br />";
        echo "<br />";
        return true;
}

function computerWins() {
        echo "<br/>";
        echo "Jocul s-a terminat! A castigat calculatorul! Click pe 'Joaca din nou' pentru a incepe un nou joc! <br />";
        echo "<br />";
        return true;
}

function endOfGameAllPlayers($player, $player2) {
    unset($_COOKIE[$player]);
    setcookie($player, 0);
    unset($_COOKIE[$player2]);
    setcookie($player2, 0);
    return true;
}

function initializePlayerScore($player) {
    if (!isset($_COOKIE["$player"])) {
        setcookie($player, 0);
    }
    return $_COOKIE["$player"];
}
?>