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
		echo "
			<h1>Innskrá</h1>
			<form>
				<fieldset>
					<legend>Innskráning</legend>
					<label for='username'>Notandi:</label>
					<input type='text' name ='username' placeholder='Notandi9001'><br>
					<label for='password'>Lykilorð:</label>
					<input type='password' name ='password' placeholder='*******'><br>
					<input type='submit' value='Innskrá!'>
				</fieldset>
			</form>
			Ekki skráður? <a href='?part=me&signup=step1'> Skráðu þig hér.</a>
		";
	}
?>

<script src="jquery.js"></script>
<script src="jquery.validate.js"></script>
<script src="formhandling.js" type="text/javascript"></script>