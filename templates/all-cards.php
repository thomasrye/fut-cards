<?
	include "../data/data.php";
	
	function getPlayerName($commonname, $firstname, $lastname, $jerseyname, $format=null) {
		if(!$format) {
			if($commonname!="") {
				$player_name = $commonname;
			} else {
				$player_name = $firstname." ".$lastname;
			}
		} else if ($format=="initial-last") {
			if($commonname!="") {
				$player_name = $commonname;
			} else {
				$player_name = substr($firstname,0,1).". ".$lastname;
			}
		} else if ($format=="last") {
			if($commonname!="") {
				$player_name = $commonname;
			} else {
				$player_name = $lastname;
			}
		} else if ($format == "jersey") {
			if ($jerseyname != "") {
				$player_name = $jerseyname;
			} else if ($commonname!="") {
				$player_name = $commonname;
			} else {
				$player_name = $lastname;
			}
		}
		return $player_name;
	}
	
	$player['player_name'] = getPlayerName($player['commonname'], $player['firstname'], $player['lastname'], $player['jerseyname'], "jersey");
	
	$sizes = array("large", "small", "mini");
	$levels = array("gold", "silver", "bronze");
	$groups = array("nonrare", "rare", "if", "tots");
	$specials = array("concept", "motm", "legend", "hero", "toty", "charity", "intl-motm", "pro-player", "record-breaker");
	
?>

<html>
	<head>
		<title>FUT Cards</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<? //<link rel="stylesheet" href="../css/futhead-cards.css"> ?>
		<link rel="stylesheet" href="../css/fut-cards.css">
	</head>
	<body>
		
		<?
			foreach ($groups as $group) {
				echo "<div class=\"group " . $group . "\">";
				foreach ($levels as $level) {
					echo "<div class=\"level " . $level . "\">";
					foreach ($sizes as $size) {
						$futlevel = $level;
						include "../templates/futcard".$futyear.".php";
						/*<img src="assets/card-fut-15-<?=$size;?>-<? echo ($group!="normal"?$group."-":""); echo $level;?>.png" class="card fut fut15 <?=$group;?> card-<?=$size;?>">*/
					}
					echo "</div>";
				}
				echo "</div>";
			}
			
			$group = null;
			foreach ($specials as $special) {
				echo "<div class=\"group\">";
				foreach ($sizes as $size) {
					$futlevel = $special;
					include "../templates/futcard".$futyear.".php";
					/*<img src="assets/card-fut-15-<?= $size . "-" . $special;?>.png" class="card fut fut15 <?=$special;?> card-<?=$size;?>">*/
				}
				echo "</div>";
			}
		?>
		
		
		
	</body>
</html>