<?php
	if( isset($sessuser))
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


