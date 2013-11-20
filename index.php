<?php
include ('functions/bootstrap.php');
bootstrap('functions');
connectdb();
checklogin();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/menustyle.css" />
		<link rel="stylesheet" type="text/css" href="css/webshop.css" />
		<script type="text/javascript" src="js/menu.js"></script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<a href="?menuoptie=homepage"><img id="logo" src="images/logo.png"></a><img id="quote" src="images/Quote.png">
			</div>
			<div id="menu">
				<?php
				echo menu();
				?>
			</div>
			<div id="content">
				<?php
				echo GetContent();
				?>
			</div>
		</div>
	</body>
</html>