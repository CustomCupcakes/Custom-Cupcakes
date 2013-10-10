<?php 

			session_start();
			$userId = $_SESSION['user_id'];

			$con = mysql_connect("localhost", "root", "Charizard");
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("poketrade", $con)
				or die("Unable to select database:" . mysql_error());

			#species level type

			if (isset( $_GET['submit1'])) { 

				$query1 = "SELECT * from pokemon p, species s where p.species_id = s.species_id and ";

				if(isset($_GET['species']))	{
					$species = $_GET['species'];
				}

				if ($species != NULL)	{
					$idquery = "SELECT species_id from species s where s.species_name='$species'";
					$result = mysql_query($idquery);
					while ($row = mysql_fetch_assoc($result))	{
						$id = $row ['species_id'];
					}
					$query1 = $query1 . "p.species_id = $id";
				}

				$level = $_GET['level'];

				if ($level != 'none' && $species != NULL)	{
					$query1 = $query1 . " and p.level = $level ";
				} else if ($level != 'none' && $species == NULL)	{
					$query1 = $query1 . "p.level = $level";
				}

				$type = $_GET['type'];

				if ($type != 'none' && ($level !='none' || $species != NULL))	{
					$query1 = $query1 . " and (s.Type_1 = '$type' or s.Type_2 = '$type') and p.species_id = s.species_id";
				} else if ($type != 'none' && $level == 'none' && $species == NULL)	{
					$query1 = $query1 . " (s.Type_1 = '$type' or s.Type_2 = '$type') and p.species_id = s.species_id";
				}

				$query1 = $query1 . " order by p.level";
				$result1 = mysql_query($query1);				
				$return = array();
				while($pokemon = mysql_fetch_assoc($result1)){
						$user_id = $pokemon['user_id'];
						$pokemon_id = $pokemon['pokemon_id'];
						if ($userId!=$user_id){
							$get_user_name_query = "SELECT username from user where user_id = $user_id";
							$user = mysql_fetch_assoc(mysql_query($get_user_name_query));
							$pokemon['trainer'] = $user['username'];
							$return[] = $pokemon;
						}
				}	
				echo json_encode($return);
			}
		



			#moves

			if (isset( $_GET['submit2'])) { 

			if(isset($_GET['move1']))	{
				$move1 = $_GET['move1'];
			} 

			if(isset($_GET['move2']))	{
				$move2 = $_GET['move2'];
			} 

			if(isset($_GET['move3']))	{
				$move3 = $_GET['move3'];
			} 

			if(isset($_GET['move4']))	{
				$move4 = $_GET['move4'];
			} 

			$moves = array($move1,$move2,$move3,$move4);

			$query2 = "SELECT * from pokemon p where ";

			$notNull = array();

			foreach ($moves as $value)	{
				if ($value != NULL){
				array_push($notNull,$value);
		}
			}

			$query2 = $query2 . "(p.first_move = '$notNull[0]' or p.second_move = '$notNull[0]' or p.third_move = '$notNull[0]' or p.fourth_move = '$notNull[0]')";

			$size = count($notNull);

			if ($size == 2)	{
				$query2 = $query2 . " and (p.first_move = '$notNull[1]' or p.second_move = '$notNull[1]' or p.third_move = '$notNull[1]' or p.fourth_move = '$notNull[1]')";
			}

			if ($size == 3)	{
				$query2 = $query2 . " and (p.first_move = '$notNull[1]' or p.second_move = '$notNull[1]' or p.third_move = '$notNull[1]' or p.fourth_move = '$notNull[1]') and (p.first_move = '$notNull[2]' or p.second_move = '$notNull[2]' or p.third_move = '$notNull[2]' or p.fourth_move = '$notNull[2]')";
			}

			if ($size == 4)	{
				$query2 = $query2 . " and (p.first_move = '$notNull[1]' or p.second_move = '$notNull[1]' or p.third_move = '$notNull[1]' or p.fourth_move = '$notNull[1]') and (p.first_move = '$notNull[2]' or p.second_move = '$notNull[2]' or p.third_move = '$notNull[2]' or p.fourth_move = '$notNull[2]') and (p.first_move = '$notNull[3]' or p.second_move = '$notNull[3]' or p.third_move = '$notNull[3]' or p.fourth_move = '$notNull[3]')";
			}

			$query2 = $query2 . " order by p.level";
			echo $query2 . "\n";
			$result = mysql_query($query2);

				$return = array();
				while($pokemon = mysql_fetch_assoc($result)){
					$user_id = $pokemon['user_id'];
						$pokemon_id = $pokemon['pokemon_id'];
						if ($userId!=$user_id){
							$get_user_name_query = "SELECT username from user where user_id = $user_id";
							$user = mysql_fetch_assoc(mysql_query($get_user_name_query));
							$pokemon['trainer'] = $user['username'];
							$return[] = $pokemon;
						}
				}
				echo json_encode($return);


			}

			#trainer badges game


			if (isset( $_GET['submit3'])) { 

			$query3 = "SELECT * from user u where ";

			if(isset($_GET['trainer']))	{
				$trainer = $_GET['trainer'];
			}

			if ($trainer != NULL)	{
				$query3 = $query3 . "u.username LIKE '%{$trainer}%'";
			}


			$badges = $_GET['badge_count'];

			if($trainer != NULL && $badges != 'none')	{
				$query3 = $query3 . " and badge_count = $badges";
			} else if ($badges != 'none' && $trainer == NULL)	{
				$query3 = $query3 . "badge_count = $badges";
			} 

			$game = $_GET['game'];

			if ($game != 'none' && ($trainer != NULL || $badges!= 'none'))	{
				$query3 = $query3 . " and game = '$game'";
			} else if ($game != 'none' && $trainer == NULL && $badges == 'none')	{
				$query3 = $query3 . "game = '$game'";
			}
			

			$result = mysql_query($query3);

			$return = array();
			while ($row = mysql_fetch_assoc($result))	{
				$return[] = $row;
			}
			echo json_encode($return);
			}
			mysql_close($con);

		?>