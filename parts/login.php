<?php
	if(isset($_GET['login']))
	{
		$db = new PDO('sqlite:football.db');

		// Nýjustu fréttir
		$results = $db->query("SELECT * FROM USERS WHERE Username='".$_POST['username']."'");
		//var_dump($results);
		if($results)
		foreach($results as $data)
		{
			if(md5($_POST['password']) == $data['Password'])
				{setcookie('user',$_POST['username'],time()+300); header("Location:index.php?part=me");}
			else
				{echo "Innskráning mistókst, rangt lykilorð.";}
		} 
		else{ echo "Þessi notandi er ekki til.";}
	}
	else
	{
		echo "
			<h1>Innskrá</h1>
			<form action='?part=me&login=step2' id='signup' method='post'>
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