<div style="max-width:700px;">
	<?php
		$db = new PDO('sqlite:../football.db');
		$results = $db->query('SELECT * FROM MATCHES WHERE Id='.$_GET['Id']);
		foreach ($results as $data) {
			echo '<h2>'.$data['Home'].' Vs.'.$data['Away'].'</h2>';
		}
	?>
</div>