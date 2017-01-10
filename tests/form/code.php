<?php
$dbhost = "localhost";
$dbuser = "alexandru.toader";
$dbpass = "pass1234";
$dbname = "form";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()) {
    die("Database connection failed:" . mysqli_connect_error() .  " (" . mysqli_connect_errno() . ")");
}
?>

<?php
if (isset($_GET['choice'])) {
        $player = $_GET['choice'];
        $options = array(
            1 => 'hartie',
            2 => 'piatra',
            3 => 'foarfeca'
        );
        $random = rand(1,3);
        $player2 = $options[$random];
        $cookie1= $_COOKIE["cookie1"];
        $cookie2= $_COOKIE["cookie2"];
        $result="Ai ales $player, iar calculatorul a ales $player2<br />";
        if ($player == $player2) {
            echo "Egalitate! Amandoi ati ales &nbsp" . ucfirst($player) . "<br />";
        } elseif (($player ==$options[1] && $player2 == $options[2]) ||
            ($player == $options[2] && $player2 == $options[3]) ||
            ($player == $options[3] && $player2 == $options[1])
        ) {
            echo "Ai castigat runda! <br />";
                if($_COOKIE["cookie1"] ==10){
                    unset($_COOKIE["cookie1"]);
                    setcookie("cookie1", 0);
                    unset($_COOKIE["cookie2"]);
                    setcookie("cookie2", 0);
                   echo "Felicitari! Ai castigat! <br />";
                   echo "<br/>";
                   echo "Jocul s-a terminat! Click pe 'Joaca din nou' pentru a incepe un nou joc! <br />";
                    echo "<br />";
                } else {
                    setcookie("cookie1", $_COOKIE["cookie1"] + 1);
                }
            }
          else {
              echo "Calculatorul a castigat runda. <br />";
              if($_COOKIE["cookie2"] ==10){
                  unset($_COOKIE["cookie2"]);
                  setcookie("cookie2", 0);
                  unset($_COOKIE["cookie1"]);
                  setcookie("cookie1", 0);
                  echo "Jocul s-a terminat! Ai pierdut! Click pe 'Joaca din nou' pentru a incepe un nou joc! <br />";
                  echo "<br />";
              } else {
                  setcookie("cookie2", $_COOKIE["cookie2"] + 1);
              }
            }
        echo $result;
        echo "<br />";
        echo "Player score: &nbsp" . $cookie1 . "<br />";
        echo "Computer score: &nbsp" . $cookie2 . "<br />";
    }
?>