<a href="#player-<?=$player['playerid'];?>" class="playercard fut<?=$futyear;?> card-<?=$size;?> <?=$futlevel;?> <?=$group;?>" style="display: inline-block;">
	<div class="hover"></div>
	<div class="playercard-rating"><?= $player['overallrating']; ?></div>
	<div class="playercard-name">
		<span><?= $player['player_name']; ?></span>
	</div>
	<div class="playercard-position"><?= $player['position']; ?></div>
	<div class="playercard-nation"><img src="../assets/nations/<?=$player['nationality'];?>.png"></div>
	<div class="playercard-club"><img src="../assets/badges/<?= $player['team_id']; ?>.png" alt="<?= $player['teamname'];?>" title="<?= $player['teamname'];?>"></div>
	<div class="playercard-picture">
		<img src="../assets/players/<?=$player['playerid'];?>.png" alt="<?= $player['player_name']; ?>">
	</div>
	<div class="playercard-mid-bar">
		<div class="playercard-workrate"><span class="label">Work</span><?=$player['attackingworkrate'] . "/" . $player['defensiveworkrate']; ?></div>
		<div class="playercard-skillmoves"><span class="label">Skill</span><?=$player['skillmoves'];?> <span class="fa fa-star"></span></div>
		<div class="playercard-weakfoot"><span class="label">Weak</span><?=$player['weakfootabilitytypecode'];?> <span class="fa fa-star"></span></div>
	</div>
	<?
		if ($player['position'] != "GK") {
			$futattrarray = $fut_array;
		} else {
			$futattrarray = $fut_gk_array;
		}
		$futattr_i = 1;
		foreach ($futattrarray as $futattr) {
	?>
			<div class="playercard-attr playercard-attr<?= $futattr_i; ?>"><?= $player[$futattr] . " " . strtoupper($futattr); ?></div>
	<?
			$futattr_i++;
		}
	?>
</a>