<h1>Mínar Síður</h1>
<p> Þú ert skráður inn sem <?php echo $sessuser; ?> </p>

	<?php
	$db = new PDO('sqlite:football.db');

	if(isset($_GET['getwinnings']))
	{include ('calcWinnings.php');}

	$results = $db->query("SELECT * FROM USERS WHERE Username='".$sessuser."'");

	foreach($results as $data)
		{
			echo "Innistæða þín er: ".$data['Cash']."<br>";
		}

	echo "<a href='?part=logout'> Útskrá</a>";

	echo "<h2>Mín veðmál</h2>
	<div class='bets'>";

		$results = $db->query("SELECT * FROM BETS WHERE Username='".$sessuser."'");
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

				if($data['Bet']=='home'){echo "<li>Þú veðjaðir ".$data['Amount']."kr. á ".$game['Home']." í leik: ".$game['Home']."(home) Vs. ".$game['Away']."(away). Stuðull: ".($game['Homewin']/100)."</li>";}
				else if($data['Bet']=='away'){echo "<li>Þú veðjaðir ".$data['Amount']."kr. á ".$game['Away']." í leik: ".$game['Home']."(home) Vs. ".$game['Away']."(away). Stuðull: ".($game['Awaywin']/100)."</li>";}
				else {echo "<li>Þú veðjaðir ".$data['Amount']."kr. á jafntefli í leik: ".$game['Home']."(home) Vs. ".$game['Away']."(away). Stuðull: ".($game['Draw']/100)."</li>";}
			}
		} 
		if($found==0){echo"Þú hefur ekki veðjað á neitt nýlega.";}
		else {echo "</ul>";}
	?>
</div>
<a href="?part=me&getwinnings=true">Sækja Vinninga</a>