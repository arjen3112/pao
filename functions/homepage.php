<?php
function homepage(){

	$query = 'SELECT * FROM `content`
		WHERE `pagina`,`content`
		AND `type` = "text"';
		
	$resultaat = mysql_query($query);
	$row = mysql_fetch_array($resultaat);

	$output='
	<div id="infohomepage">'.$resultaat.'</div>
	<div id="imghome1"><img src="images/homepage/vlinder.jpg"></div>
	<div id="imghome2"><img src="images/homepage/kat.jpg"></div>';
	
	return $output;
}