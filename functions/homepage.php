<?php
function homepage(){

	$query = 'SELECT * FROM `content`
		WHERE `pagina` = "homepage"
		AND `type` = "text"';
		
	$resultaat = mysql_query($query);
	$row = mysql_fetch_array($resultaat);
	
	$q = 'SELECT * FROM `content`
		WHERE `pagina` = "homepage"
		AND `type` = "image"';
		
	$r = mysql_query($q);
	$rw = mysql_fetch_array($r);
	
	$output='
	<div id="infohomepage">'.$row["content"].'</div>
	<div id="imghome1"><img src="'.$r.'"></div>
	<div id="imghome2"><img src="'.$r.'"></div>';
	
	return $output;
}