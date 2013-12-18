<?php
function informatie() {
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
			  		  		<td rowspan="2" id="informatierechts">' . $ro["content"] . '</td>
		  		  		</tr>
		  		  		<tr>
		  		  			<td><div id="informatielinks">' . $row["content"] . '</div></td>
		  		  		</tr>';
						
		  	if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
			$output .= '<tr>
							<td>
								<input type="submit" class="buttonInformatie" value="Verander content" name="veranderContent">
							</td>
						</tr>
						</table>
						</form>
						</div>';
			}else{
				$output.='</table>
  		  		</form>
  		  		</div>';
			};  		  		
		
			if (isset($_POST['veranderContent'])||isset($_POST['uploadafbeeldingInfo'])||isset($_POST['uploadtekst1'])||isset($_POST['uploadtekst2'])){
				$output = veranderContent();
			}
	return $output;
}

function veranderContent(){
	if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
		$output = cmsInformatie();
	} elseif(isset($_SESSION["profiel"]) && $_SESSION["profiel"] > "1") {
		$output = '"U beschikt niet over de juiste rechten om deze site te bezoeken"';
	}else{
		$output = '"U moet ingelogd om deze site te bezoeken"';
	}
	
	return $output;
}
