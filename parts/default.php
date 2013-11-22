<h1>Velkomin á fótbolta síðuna!</h1>

<div class="feedbox">
	<h2>Nýjustu fréttir</h2>

	<?php
		include 'utils.php';
		$db = new PDO('sqlite:football.db');
		$results = $db->query('SELECT * FROM NEWS ORDER BY Time DESC');
		echo '<ul>';
		$count = 0;
		foreach($results as $data)
		{
			if ($count == 0){
				echo '<li><h3>'.$data['Title'].'</h3>'.'<p>'.date('j.n.Y H:i', $data['Time']).'</p></li>';
				echo '<p>'.cutString($data['Content']).'<a href="?part=news&Id='.$data['Id'].'"> Lesa meira</p>';
			}
			else{
				echo '<li><h5><a href="?part=news&Id='.$data['Id'].'">'.$data['Title'].'</a></h5>';
			}
			
			$count++;
			if($count == 3){break;}
		} 
		echo '</ul>';

	?>

</div>

<div class="feedbox">
	<h2>Næstu leikir</h2>

	<?php
		include 'utils.php';
		$db = new PDO('sqlite:football.db');
		$results = $db->query('SELECT * FROM MATCHES WHERE Time >'.time().' ORDER BY Time');
		echo '<ul>';
		$count = 0;
		foreach($results as $data)
		{
			if ($count == 0){
				echo '<h3>'.$data['Home'].' Vs. '.$data['Away'].'</h3>'.'<p>'.date('j.n.Y H:i', $data['Time']).'</p>';
				echo '<p>'.cutString($data['Descr']).'</p>';
			}
			else{
				echo '<li><h5><a href="?part=matches&Id='.$data['Id'].'">'.$data['Home'].' Vs. '.$data['Away'].'</a></h5></li>';
			}

			$count++;
			if($count == 3){break;}
		} 
		echo '</ul>';

	?>

</div>


<div class="feedbox">
	<h2>Nýjustu úrslit</h2>

	<?php
		include 'utils.php';
		$db = new PDO('sqlite:football.db');
		$results = $db->query('SELECT * FROM MATCHES WHERE Time <'.time().' AND Score IS NOT NULL ORDER BY Time DESC');
		echo '<ul>';
		$count = 0;
		foreach($results as $data)
		{
			if ($count == 0){
				// echo '<h3>'.$data['Home'].' - '.$data['Away']." ".floor($data['Score']/100).' - '.($data['Score']%10).'</h3>';
				echo '<h3>'.$data['Home']." ".floor($data['Score']/100).' - '.($data['Score']%10)." ".$data['Away'].'</h3>';
				echo '<p>'.cutString($data['Descr']).'</p>';
			}
			else{
				echo '<li><h5><a href="?part=matches&Id='.$data['Id'].'">'.$data['Home']." ".floor($data['Score']/100).' - '.($data['Score']%10)." ".$data['Away'].'</a></h5></li>';
			}

			$count++;
			if($count == 3){break;}
		} 
		echo '</ul>';

	?>

</div>