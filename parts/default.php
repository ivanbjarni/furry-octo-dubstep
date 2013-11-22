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
				echo '<p>'.cutString($data['Content']).'</p>';
			}
			else{
				echo '<li><h2><a href="?part=news&Id='.$data['Id'].'">'.$data['Title'].'</a></h2> Þann '.date('j.n.Y H:i', $data['Time']).'</li>';
				if( (isset($_GET['Id'])) && ($data['Id'] == $_GET['Id']) )
					{echo $data['Content'];
				}
			}
			
			$count++;
			if($count == 2){break;}
		} 
		echo '</ul>';

	?>

</div>

<div class="feedbox">
	<h2>Nýjustu Úrslit</h2>

	<?php

		$db = new PDO('sqlite:football.db');
		$results = $db->query('SELECT * FROM MATCHES ORDER BY Time DESC');
		echo '<ul>';
		$count = 0;
		foreach($results as $data)
		{
			if ($count == 0){
				echo '<h3>'.$data['Title'].'</h3>'.'<p>'.date('j.n.Y H:i', $data['Time']).'</p>';
				echo '<p>'.cutString($data['Descr']).'</p>';
			}
			echo '<li><h2><a href="?part=news&Id='.$data['Id'].'">'.$data['Title'].'</a></h2> Þann '.date('j.n.Y H:i', $data['Time']).'</li>';
			if( (isset($_GET['Id'])) && ($data['Id'] == $_GET['Id']) )
				{echo $data['Content'];
			}
		} 
		echo '</ul>';

	?>

</div>