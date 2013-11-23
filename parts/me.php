<?php
	if( isset($_COOKIE['user']))
	{
		echo "
			<h1>Mínar Síður</h1>
		";
	}
	else if( isset($_GET['signup']))
	{
		include('signup.php');
	}
	else
	{
		include('login.php');
	}
?>


