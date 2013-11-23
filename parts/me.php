<?php
	if( isset($_COOKIE['user']))
	{
		include('mysite.php');
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


