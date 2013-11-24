<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$sessuser = $_SESSION['user'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Þar sem fótbolti er í fyrirrúmi</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="sty.css">
		<link rel="stylesheet" type="text/css" href="styles/passwordMeter.css">
		<link rel="shortcut icon" href="bolti.ico">
		<link rel="stylesheet" type="text/css" href="javascript/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link type="text/css" rel="stylesheet" href="styles/jquery-ui.css"/>
	</head>

	<body>
		<script href="javascript/fbsdk.js"></script>
		<div class="container">
			<?php require 'utils.php'; ?>
			<?php include'header.php'; ?>
			<div class="wrapper">
				<?php
					$part = 'default';
					if (isset($_GET['part']))
					{
						$part = $_GET['part'];
					}
					switch ($part)
					{
						case 'news':
							include('parts/news.php');
							break;
						case 'matches':
							include('parts/matches.php');
							break;
						case 'me':
							include('parts/me.php');
							break;
						case 'logout':
							include('parts/logout.php');
							break;
						case 'default':
						default:
							include('parts/default.php');
							break;
					}
				?>
			</div>
		</div>
	</body>
</html> 
