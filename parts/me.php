<?php
	if( isset($_COOKIE['user']))
	{
		echo "
			<h1>Mínar Síður</h1>
		";
	}
	else if( isset($_GET['signup']))
	{
		echo "
			<h1>Nýskrá</h1>
			<form>
				<label for='username'>Notandi:</label>
				<input type='text' name ='username' placeholder='Notandi9001'><br>
				<label for='password'>Lykilorð:</label>
				<input type='password' name ='password' placeholder='*******'>
			</form>
		";
	}
	else
	{
		echo "
			<h1>Innskrá</h1>
			<form>
				<label for='username'>Notandi:</label>
				<input type='text' name ='username' placeholder='Notandi9001'><br>
				<label for='password'>Lykilorð:</label>
				<input type='password' name ='password' placeholder='*******'>
			</form>
			Ekki skráður? <a href='?part=me&signup=true'> Skráðu þig hér.</a>
		";
	}
?>