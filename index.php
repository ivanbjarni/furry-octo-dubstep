<!DOCTYPE HTML>
<html>
	<head>
		<title>Þar sem fótbolti er í fyrirrúmi</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="sty.css">
	</head>

	<body>
	<script href="fbsdk.js"></script>
	<div class="container">
		<?php include 'utils.php'; ?>
		<?php include'header.php'; ?>
		
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
				/*case 'me':
					include('parts/me.php');
					break;*/
				case 'default':
				default:
					include('parts/default.php');
					break;
			}
		?>

		</div>
	</body>
</html> 
