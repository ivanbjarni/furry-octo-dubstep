<h1 id="matches">Matches</h1>

<?php

	$db = new PDO('sqlite:football.db');

	//Atburðir framundan
	$results = $db->query('SELECT * FROM MATCHES ORDER BY Time DESC');
	echo '<ul>';
	foreach($results as $data)
	{
		echo '<div class="newsmatch-container">';
		if( isset($_GET['Id']) && $data['Id'] == $_GET['Id'] ) {
			if($data['Score'] == NULL){
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches">'.$data['Home'].' Vs.'.$data['Away'].'</a></h2></li>';	
			}
			else{
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches">'.$data['Home']." ".floor($data['Score']/100).' - '.($data['Score']%10)." ".$data['Away'].'</a></h2></li>';
			}
			echo '<div class="newsmatch_content">'.$data['Descr'];
			if( isset($_COOKIE['user']) && time() < $data['Time'] ) {
				echo '<a class="fancybox fancybox.ajax" href="parts/bet.php?Id='.$data['Id'].'">Veðja á leik</a>';					
			}
			echo '</div>';
		}
		else{
			if($data['Score'] == NULL){
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches&Id='.$data['Id'].'">'.$data['Home'].' Vs.'.$data['Away'].'</a></h2></li>';	
			}
			else{
				echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=matches&Id='.$data['Id'].'">'.$data['Home']." ".floor($data['Score']/100).' - '.($data['Score']%10)." ".$data['Away'].'</a></h2></li>';
			}
		}
		echo '</div>';
		echo "<hr>";
	} 
	echo '</ul>';
?>
<script src="javascript/jquery.js"></script>
<script src="javascript/fancy.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="javascript/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="javascript/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>