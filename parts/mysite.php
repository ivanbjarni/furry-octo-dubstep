<h1>Mínar Síður</h1>
<p> Þú ert skráður inn sem <?php echo $_COOKIE['user']; ?> </p>
<a href="?part=logout"> Útskrá</a>

<h2>Mín veðmál</h2>
<div class="bets">
	<?php
		$db = new PDO('sqlite:football.db');

		$results = $db->query("SELECT * FROM BETS WHERE Username='".$_COOKIE['user']."'");
		$found = 0;
		if($results)
		foreach($results as $data)
		{
			$res = $db->query("SELECT * FROM MATCHES WHERE Id='".$data['Id']."'");
			if($res)
			foreach($res as $game)
			{
				if($found==0){echo "<ul>";}
				$found=1;

				if($data['Bet']=='home'){echo "<li>Þú veðjaðir á".$game['Home']." í leik: ".$game['Home']."(home) Vs. ".$game['Away']."(away). Stuðull".$game['Homewin']."</li>";}
				else if($data['Bet']=='away'){echo "<li>Þú veðjaðir á".$game['Away']." í leik: ".$game['Home']."(home) Vs. ".$game['Away']."(away). Stuðull".$game['Awaywin']."</li>";}
				else {echo "<li>Þú veðjaðir á jafntefli í leik: ".$game['Home']."(home) Vs. ".$game['Away']."(away). Stuðull".$game['Draw']."</li>";}
			}
		} 
		if($found==0){echo"Þú hefur ekki veðjað á neitt nýlega.";}
		else {echo "</ul>";}
	?>
</div>