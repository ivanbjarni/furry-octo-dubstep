<?php
	echo '<div class="fancy">';
		$db = new PDO('sqlite:../football.db');
		$results = $db->query('SELECT * FROM MATCHES WHERE Id='.$_GET['Id']);
		foreach ($results as $data) {

			echo '<h2>'.$data['Home'].' Vs.'.$data['Away'].'</h2>';
			echo 
				'<label for="amount">Veðja:<span id="betamount"></span></label>
				<div id="slider"></div>
				<form id="betform">
					
					<input type="radio" name ="group" value="h'.$data['Id'].'">
					<label for="h'.$data['Id'].'">'.$data['Home']." vinnur (".($data['Homewin']/100).')</label>
					<br>
					<input type="radio" name ="group" value="d'.$data['Id'].'">
					<label for="d'.$data['Id'].'">Jafntefli ('.($data['Draw']/100).')</label>
					<br>
					<input type="radio" name ="group" value="a'.$data['Id'].'">
					<label for="a'.$data['Id'].'">'.$data['Away']." vinnur (".($data['Awaywin']/100).')</label>
					<br>
					<input id="bet_btn" type="submit" value="Veðja!"">
				</form>
				<div id="prump"></div>
			</div>';
		}
		
?>
<script src="javascript/jquery.js"></script>
<script src="javascript/bet.js"></script>
<script src="javascript/jquery-ui.js"></script>