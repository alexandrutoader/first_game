<?php
function incrementGameByOnePlayer($player){
    setcookie($player, $_COOKIE[$player] + 1);
    return true;

}

function incrementGameByOneComputer($player2){
    setcookie($player2, $_COOKIE[$player2] + 1);
    return true;
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

function endOfGameAllPlayers($player, $player2){
    unset($_COOKIE[$player]);
    setcookie($player, 0);
    unset($_COOKIE[$player2]);
    setcookie($player2, 0);
    return true;
}
?>