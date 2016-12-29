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
					
			} elseif ( ($player_choice == 'hartie') && ($computer == 2) 
							||  ($player_choice == 'piatra') && ($computer == 3) 
							||  ($player_choice == 'foarfeca') && ($computer == 1) )
			    {
						echo "<p>Ai castigat! Felicitari!</p>";
				} else {
					echo "<p>Calculatorul a castigat!</p>";
				}
					
					$result.= " Ai ales $player_choice, iar calculatorul a ales $computer_choice.";
					return $result;
		}
		
?>