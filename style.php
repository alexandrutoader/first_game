<?php
		if(isset($_GET['choice'])) {
			$player_choice=$_GET['choice'];
			$computer= rand(1, 3);
			$result='';
			switch($computer) {
				case 1:
					$computer_choice='hartie';
					break;
				case 2:
					$computer_choice='piatra';
					break;
				case 3:
					$computer_choice='foarfeca';
					break;
			}
			if($player_choice == $computer_choice) {
					$result = 'Egalitate! Amandoi ati ales &nbsp' . ucfirst($player_choice) . "<br />";
					$_SESSION['scoresss']['egal'] += 1;							
			} elseif ( ($player_choice == 'hartie') && ($computer == 2) 
							||  ($player_choice == 'piatra') && ($computer == 3) 
							||  ($player_choice == 'foarfeca') && ($computer == 1) )
			    {
						echo "<p>Ai castigat! Felicitari!</p>";
						$_SESSION['score']['player'] += 1;
				} else {
					echo "<p>Calculatorul a castigat!</p>";
					$_SESSION['scoress']['computer'] += 1;
				}
		
					$result.= " Ai ales $player_choice, iar calculatorul a ales $computer_choice.";
					echo $result;
					echo "<p>Player score: ".$_SESSION['score']['player']."</p>\n";
					echo "<p>Computer score: ".$_SESSION['scoress']['computer']."</p>\n";
		}
		
?>