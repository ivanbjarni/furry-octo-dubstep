<h1>Logout</h1>
<?php
	if($sessuser)
	{echo '<p>Þú hefur verið skráður út, <a href="index.php">fara á forsíðu.</a></p>'; session_destroy();}
	else
	{echo '<p> Þú þarft að vera skráður inn til að skrá þig út <a href="index.php">fara á forsíðu.</a></p>';}
?>
