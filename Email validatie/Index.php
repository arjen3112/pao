<html>


<head>

</head>

<body>

<form action="#" method="POST">

Username:<input type="text" name="username" />
Password:<input type="password" name="password" />
Email <input type="email" name="email" />
<input type="submit" name="submit">
</form>

<?php
include 'Functions.php' ;
DBconnectie();
email();

?>

</body>


</html>


