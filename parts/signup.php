<?php
if($_GET['signup']=='step1')
{
	echo "
		<h1>Nýskrá</h1>
		<form action='?part=me&signup=step2' id='signup' method='post'>
			<fieldset>
				<legend>Nýskráning</legend>
				<label for='username'>Notandi:</label>
				<input type='text' name ='username' placeholder='Notandi9001'><br>
				<label for='password'>Lykilorð:</label>
				<input type='password' name ='password' placeholder='*******'><br>
				<div id='passwordStrengthDiv' class='is0'></div><br>
				<label for='email'>Netfang:</label>
				<input type='text' name ='email' placeholder='john@example.com'><br>
				<input type='submit' value='Skrá mig!'>
			</fieldset>
		</form>
	";
}
else
{
			
}
?>