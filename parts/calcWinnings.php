<?php
	$results = $db->query("SELECT * FROM BETS WHERE Username='".$sessuser."'");
	$found2 = 0;
	$winnings = 0;
	if($results)
	foreach($results as $data)
	{
		$res = $db->query("SELECT * FROM MATCHES WHERE Id='".$data['Id']."'");
		if($res)
		foreach($res as $game)
		{
			if($game['Score']!=NULL)
			{
				$s1=floor($game['Score']/100);
				$s2=$game['Score']%100;
				$found2+=1; 
				if 		( ($s1>$s2) && $data['Bet']=='home'){$winnings = $winnings + ceil($data['Amount']*$game['Homewin']/100);}
				else if ( ($s1<$s2) && $data['Bet']=='away'){$winnings = $winnings + ceil($data['Amount']*$game['Awaywin']/100);}
				else if	($data['Bet']=='draw')				{$winnings = $winnings + ceil($data['Amount']*$game['Drawwin']/100);}
				
				$updatebets = $db->query('DELETE FROM BETS where Username = "'.$sessuser.'" AND Id = "'.$data['Id'].'"');
			}
		}
	}
	$updateusers = $db->query('UPDATE USERS SET Cash=Cash+'.$winnings.' where Username = "'.$sessuser.'"');
?>