<?php
function informatie(){
	//query voor tekst 1
	$query = 'SELECT * FROM `content`
		WHERE `pagina` = "informatie"
		AND `type` = "text"
		AND `id`= "4"';

	$resultaat = mysql_query($query);
	$row = mysql_fetch_array($resultaat);
	//query voor tekst 2
	$qu = 'SELECT * FROM `content`
		WHERE `pagina` = "informatie"
		AND `type` = "text"
		AND `id`= "6"';

	$re = mysql_query($qu);
	$ro = mysql_fetch_array($re);
	//query voor plaatje
	$q = 'SELECT `content` FROM `content`
			WHERE `pagina` = "informatie"
			AND `type` = "image"
			AND `id`= "5"';

	$r = mysql_query($q);
	$rw = mysql_fetch_array($r);
	
	$output = '<div id="infoInformatie">
				<form method="post" action="?menuoptie=informatie">
	  		  		<table id="tableInfo">
		  		  		<tr>
			  		  		<td><div id="imginformatie"><img src="' . $rw["content"] . '"></div></td>
			  		  		<td rowspan="2"><div id="infoinformatie2">' . $ro["content"] . '</div></td>
		  		  		</tr>
		  		  		<tr>
		  		  			<td><div id="infoinformatie1">' . $row["content"] . '</div></td>
		  		  		</tr>
	  		  		</table>
  		  		</form>
  		  		</div>';
	return $output;
}