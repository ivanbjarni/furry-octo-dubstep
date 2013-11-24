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
	$db = new PDO('sqlite:football.db');
	$error = 0;

	if($_POST['username']==""){if(!$error){echo "Skráning tókst ekki";} echo ", Fylla þarf út í  nafn"; $error=1;}
	else if (strlen($_POST['username'])>30 || strlen($_POST['username'])<6) {if(!$error){echo "Skráning tókst ekki";} echo ", Notandanafn þarf að vera á milli 6 og 30 stafir"; $error=1;}
	if($_POST['password']==""){if(!$error){echo "Skráning tókst ekki";} echo ", Fylla þarf út í password"; $error=1;}
	else if (strlen($_POST['password'])>30 || strlen($_POST['password'])<6) {if(!$error){echo "Skráning tókst ekki";} echo ", Lykilorð þarf að vera á milli 6 og 30 stafir"; $error=1;}
	$eml = $_POST['email']; 
	if($eml==""){if(!$error){echo "Skráning tókst ekki";} echo ", Fylla þarf út í email"; $error=1;}
	else if(!filter_var($eml, FILTER_VALIDATE_EMAIL)) {if(!$error){echo "Skráning tókst ekki";} echo ", Netfang var ekki gilt. "; $error=1;}
	

	if(!$error)
	{
		$stmt = $db->prepare("INSERT INTO USERS (Username,Password,Email,Cash) VALUES (:un,:pw,:em,:mn)");

		$stmt->bindParam(':un', $username);
		$stmt->bindParam(':pw', $password);
		$stmt->bindParam(':em', $email);
		$stmt->bindParam(':mn', $money);
		
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$money = 100;
		$stmt->execute();

		$errorAt = $db->errorInfo();
		if($errorAt[1]==NULL)
		{echo "Notandinn ".$_POST['username']." hefur verið skráður! <a href='?part=me'>Innskráning.</a><br>";}
		else
		{echo "Villa kom upp: ".$errorAt[2]." <a href='?part=me&signup=step1'>Til baka.</a>";}

		//loka tengingu
		unset($db); unset ($stmt); unset($errorAt);
	}
	else
	{echo "<a href='?part=me&signup=step1'>Til baka.</a>";}			
}
?>

<script src="javascript/jquery.js"></script>
<script src="javascript/jquery.validate.js"></script>
<script src="javascript/formhandling.js" type="text/javascript"></script>
<script src="javascript/passwordMeter.js" type="text/javascript"></script>