<?php
include 'Functions.php';
DBconnectie();
if (isset($_GET['key'])){






$key=mysql_real_escape_string($_GET['key']);

$sql="SELECT * FROM `login` WHERE `Key`='$key'";
$result=mysql_query($sql);
$count =mysql_num_rows($result);
if($count==1){
mysql_query("UPDATE `login` SET `validated`='1' WHERE `Key`='$key' ");
echo 'het is gelukt';
}
else {
echo 'Er is iets fout gegaan probeer het opnieuw';

}

}

?>