<?php
	if(isset($_GET['login']))
	{
		$db = new PDO('sqlite:football.db');

		// Nýjustu fréttir
		$results = $db->query("SELECT * FROM USERS WHERE Username='".$_POST['username']."'");
		$found=0;
		if($results)
		foreach($results as $data)
		{
			$found=1;
			if(md5($_POST['password']) == $data['Password'])
				{$_SESSION['user']=$_POST['username']; echo "Velkominn ".$_POST['username']." <a href='?part=me'> Mínar Síður</a>"; }
			else
				{echo "Innskráning mistókst, rangt lykilorð.";}
		} 
		if ($found==0){ echo "Þessi notandi er ekki til.";}
	}
	else
	{
		echo "
			<h1>Innskrá</h1>
			<form action='?part=me&AMP;login=step2' id='signup' method='post'>
				<fieldset>
					<legend>Innskráning</legend>
					<label>Notandi:</label>
					<input type='text' name ='username' placeholder='Notandi9001'><br>
					<label>Lykilorð:</label>
					<input type='password' name ='password' placeholder='*******'><br>
					<input type='submit' value='Innskrá!'>
				</fieldset>
			</form>
			Ekki skráður? <a href='?part=me&AMP;signup=step1'> Skráðu þig hér.</a>
		";
	}
?>