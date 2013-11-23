<?php
	unset($_COOKIE['user']);
	while(!if( isset($_COOKIE['user'])))
	header("Location:index.php");
?>