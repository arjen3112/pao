<?php

function DBconnectie(){
$link = mysql_connect("localhost","root","");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $link);
}


function validate(){


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



}

function email(){

if(isset($_POST['username']))
{



$email=$_POST['email'];
$key=md5($_POST['email']);
$password=md5($_POST['password']);
$username=$_POST['username']; 

mysql_query("INSERT INTO `login` (`Username`,`Password`,`E-mail`,`Rechten`,`validated`,`Key`) VALUES ('$username', '$password', '$email', '1', '0','$key')");
echo 'u bent geregistreerd';

$bericht=' Copy/paste this link into your browser localhost/PHP/Email%20validatie/validate.php?key='.$key;

mail($email,"validate",$bericht,"From:pietje@hotmail.com");
}






else{
echo 'U mist iets ,probeer het opnieuw';
}

}


?>