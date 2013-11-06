<?php
function homepage(){

	$query = 'SELECT * FROM `content`
		WHERE `pagina` = "homepage"
		AND `type` = "text"';
		
	$resultaat = mysql_query($query);
	$row = mysql_fetch_array($resultaat);
	
	$q = 'SELECT `content` FROM `content`
		WHERE `pagina` = "homepage"
		AND `type` = "image"
		AND `id`= "2" OR `id` = "3"';
		
	$r = mysql_query($q);
		
	$output='
	<div id="infohomepage">'.$row["content"].'</div>
	';
	$i=1;
	while ($rw = mysql_fetch_array($r)) {
		$output.='<div id="imghome'.$i.'"><img src="'.$rw["content"].'"></div>';
		$i++;
	}
	
	return $output;
}