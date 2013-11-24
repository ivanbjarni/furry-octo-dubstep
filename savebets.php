<?php
session_start();
$sessuser = $_SESSION['user'];
?>
<?php 
	$db = new PDO('sqlite:football.db');

	$user = "";
	$amount = (int)$_POST['amount'];
	$betchoice = $_POST['betchoice'];
	$id = (int) substr($betchoice, 4);
	$betc = substr($betchoice, 0, 4);

	$results = $db->query('SELECT * FROM USERS WHERE Username="'.$sessuser.'"');
	$cash = 0;
	$str = "";
	$success = true;
	if($results){
		foreach ($results as $data) {
			$cash = $data['Cash'];
			if($cash < $amount){
				$str = '{ "success" : "no"}';
				$success = false;
				echo $str;
			}
			else{
				$user = $data['Username'];
				
				$str = '{"success" : "yes", "str" : "Veðmálið hefur verið samþykkt þú ert '.$amount.' kr. fátækari"}';

				$updateusers = $db->query('UPDATE USERS SET Cash='.($cash - $amount).' where Username = "'.$user.'"');

				$res = $db->query('INSERT INTO BETS VALUES("'.$user.'",'.$id.','.$amount.',"'.$betc.'" )');

				echo $str;
			}
		}
	}
?>