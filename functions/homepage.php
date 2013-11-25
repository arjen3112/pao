<?php
function homepage() {

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

	$output = '
		<div id="infohomepage">' . $row["content"] . '</div>
		';
	$i = 1;
	while ($rw = mysql_fetch_array($r)) {
		$output .= '<form method="post" action="?menuoptie=homepage" id="formHomepage"><div id="imghome' . $i . '"><img src="' . $rw["content"] . '"></div>';
		$i++;

		if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
			$output .= '<input type="submit" class="buttonHomepage" value="Upload afbeelding" name="upload"></form>';
		}
	}
	if (isset($_POST['upload'])||isset($_POST['uploadtekst'])||isset($_POST['uploadafbeelding1'])||isset($_POST['uploadafbeelding2'])) {
		$output = upload();
	}

	return $output;
}

function upload() {
	if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
		$output = cmsHomepage();
	} elseif(isset($_SESSION["profiel"]) && $_SESSION["profiel"] > "1") {
		$output = '"U beschikt niet over de juiste rechten om deze site te bezoeken"';
	}else{
		$output = '"U moet ingelogd om deze site te bezoeken"';
	}
	return $output;
}
