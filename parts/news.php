<div id="fb-root"></div>
<script>
	(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=1425022454382317";
  		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<h1>Fréttir!</h1>

<?php

	$db = new PDO('sqlite:football.db');

	// Nýjustu fréttir
	$results = $db->query('SELECT * FROM NEWS ORDER BY Time DESC');
	foreach($results as $data)
	{
		echo '<div class="newsmatch-container">';
			echo '<h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span><span class="newsmatch_title">'.$data['Title'].'</span></h2>';
			echo '<div class="newsmatch_content"';
			if(isset($_GET['Id']) && $_GET['Id']==$data['Id']){echo ' id="nothide"';}
			echo '><p>'.$data['Content'].'</p>';
			echo '<div class="fb-comments" data-href="http://notendur.hi.is/ibj9/verkefni/hiddenlol/pmou/index.php?part=news&AMP;Id='.$data['Id'].'" data-numposts="5" data-colorscheme="dark">
			</div></div>';
		
		echo '</div>';
		echo "<hr>";
	} 
?>