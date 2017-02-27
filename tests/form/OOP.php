<?php

class Players {

    var $playerName = 'Gigel';
    var $player2Name = 'Calculatorul';

    public function player($playerName) {
        echo "Felicitari " . $playerName . " ai castigat!";
    }

    public function computer($player2Name) {
        echo "Ai pierdut! " . $player2Name . " a castigat.";
    }
}

class Game extends Players {

    public function initializePlayerScore($player) {
        if (!isset($_COOKIE["$player"])) {
            setcookie($player, 0);
        }
        return $_COOKIE["$player"];
    }

    public function incrementGameByOnePlayer($player){
        $newPlayerScore = $_COOKIE[$player] + 1;
        setcookie($player, $newPlayerScore);
        return $newPlayerScore;
    }

    public function playerWins(){
        echo "Felicitari! Ai castigat! <br />";
        echo "<br/>";
        echo "Jocul s-a terminat! Click pe 'Joaca din nou' pentru a incepe un nou joc! <br />";
        echo "<br />";
        return true;
    }

    public function computerWins() {
        echo "<br/>";
        echo "Jocul s-a terminat! Ai pierdut! Click pe 'Joaca din nou' pentru a incepe un nou joc! <br />";
        echo "<br />";
        return true;
    }

    public function endOfGameAllPlayers($player, $player2) {
        unset($_COOKIE[$player]);
        setcookie($player, 0);
        unset($_COOKIE[$player2]);
        setcookie($player2, 0);
        return true;
    }

    public function gameOptions()
    {
        $player1 = new Players();
        $player1->playerName;
        $player2 = $player1;
        $player2->player2Name;
        $playerScore = new Game();
        $player2Score = $playerScore;
        $playerScore->initializePlayerScore($player1);
        $player2Score->initializePlayerScore($player2);
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
                    $query = "UPDATE scor SET Player = 0;";
                    $query .= "UPDATE scor SET Computer = 0";
                    $q1 = $db->query($query);
                    $this->endOfGameAllPlayers($playerName, $player2Name);
                    $this->playerWins();
                } else {
                    $playerScore = $this->incrementGameByOnePlayer($playerName);
                    echo "Ai castigat runda! <br />";
                    $query = "UPDATE scor SET Player = '$playerScore'";
                    $q1 = $db->query($query);
                }
            } else {
                if ($_COOKIE[$player2Name] == 10) {
                    $query2 = "UPDATE scor SET Computer = 0;";
                    $query2 .= "UPDATE scor SET Player = 0";
                    $q2 = $db->query($query2);
                    $this->endOfGameAllPlayers($playerName, $player2Name);
                    $this->computerWins();
                } else {
                    $player2Score = $this->incrementGameByOnePlayer($player2Name);
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
    }
}




