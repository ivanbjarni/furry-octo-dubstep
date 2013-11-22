<h1>Matches</h1>

<?php

	$db = new PDO('sqlite:football.db');

	//Atburðir framundan
	$results = $db->query('SELECT * FROM MATCHES ORDER BY Time DESC');
	echo '<ul>';
	foreach($results as $data)
	{
		//echo '<li><h2><a href="?part=matches&Id='.$data['Id'].'">'.$data['Home'].' Vs.'.$data['Away'].'</a></h2> Þann '.date('j.n.Y H:i', $data['Time']).'</li>';
		echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=news&Id='.$data['Id'].'">'.$data['Home'].' Vs.'.$data['Away'].'</a></h2></li>';
		if( (isset($_GET['Id'])) && ($data['Id'] == $_GET['Id']) )
			{echo $data['Descr'];}
		echo "<hr>";
	} 
	echo '</ul>';
?>