<h1>Matches</h1>

<?php

	$db = new PDO('sqlite:football.db');

	//Atburðir framundan
	$results = $db->query('SELECT * FROM MATCHES ORDER BY Time DESC');
	echo '<ul>';
	foreach($results as $data)
	{
		if( isset($_GET['Id']) && $data['Id'] == $_GET['Id'] ) {
			if($data['Score'] == NULL){
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches">'.$data['Home'].' Vs.'.$data['Away'].'</a></h2></li>';	
			}
			else{
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches">'.$data['Home']." ".floor($data['Score']/100).' - '.($data['Score']%10)." ".$data['Away'].'</a></h2></li>';
			}
			echo $data['Descr'];
		}
		else{
			if($data['Score'] == NULL){
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches&Id='.$data['Id'].'">'.$data['Home'].' Vs.'.$data['Away'].'</a></h2></li>';	
			}
			else{
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches&Id='.$data['Id'].'">'.$data['Home']." ".floor($data['Score']/100).' - '.($data['Score']%10)." ".$data['Away'].'</a></h2></li>';
			}
		}
		
		echo "<hr>";
	} 
	echo '</ul>';
?>