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
		echo '<li><h2><a href="?part=news&Id='.$data['Id'].'">'.$data['Title'].'</a></h2> Þann '.date('j.n.Y H:i', $data['Time']).'</li>';
		if( (isset($_GET['Id'])) && ($data['Id'] == $_GET['Id']) )
			{echo $data['Content'];
		echo '<div class="fb-comments" data-href="http://notendur.hi.is/ibj9/verkefni/hiddenlol/pmou/news.php?Id='.$data['Id'].'" data-numposts="5"></div>';
		}
		echo "<hr>";
	} 
	echo '</ul>';
?>