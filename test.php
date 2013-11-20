<?php
include ('functions/bootstrap.php');
bootstrap('functions');
connectdb();
checklogin();
?>
<html>
	<head>

	</head>

	<body>
		<?php
            echo loadwebshopitems();
		?>
	</body>
</html>


