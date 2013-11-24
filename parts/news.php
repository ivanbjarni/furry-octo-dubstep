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
	echo '<ul>';
	foreach($results as $data)
	{
		echo '<div class="newsmatch-container">';
		if( isset($_GET['Id']) && $data['Id'] == $_GET['Id'] ){
			echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=news">'.$data['Title'].'</a></h2></li>';
			echo '<div class="newsmatch_content"><p>'.$data['Content'].'</p>';
			echo '<div class="fb-comments" data-href="http://notendur.hi.is/ibj9/verkefni/hiddenlol/pmou/index.php?part=news&Id='.$data['Id'].'" data-numposts="5" data-colorscheme="dark"></div></div>';
		}
		else{
			echo '<li><h2><span class="date">'.date('j.n.Y H:i', $data['Time']).'</span> <a href="?part=news&Id='.$data['Id'].'">'.$data['Title'].'</a></h2></li>';
		}
		echo '</div>';
		echo "<hr>";
	} 
	echo '</ul>';
?>