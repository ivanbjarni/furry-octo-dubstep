<h1 id="matches">Leikir</h1>

<?php

	$db = new PDO('sqlite:football.db');

	//Atburðir framundan
	$results = $db->query('SELECT * FROM MATCHES ORDER BY Time DESC');
	foreach($results as $data)
	{
		echo '<div class="newsmatch-container">';
			if($data['Score'] == NULL){ $between = 'Vs.';}
			else { $between = floor($data['Score']/100).' - '.($data['Score']%10); }

			echo '<h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <span class="newsmatch_title">'.$data['Home'].' '.$between.' '.$data['Away'].'</span></h2>';
			echo '<div class="newsmatch_content"';
			if(isset($_GET['Id']) && $_GET['Id']==$data['Id']){echo ' id="nothide"';}
			echo '>'.$data['Descr'];

			if( isset($sessuser) && time() < $data['Time'] ) {
				echo '<a class="fancybox fancybox.ajax" href="parts/bet.php?Id='.$data['Id'].'">Veðja á leik</a>';					
			}
			echo '</div>';
		echo '</div>';
		echo "<hr>";
	} 
?>
<script src="javascript/jquery.js"></script>
<script src="javascript/fancy.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="javascript/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="javascript/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>