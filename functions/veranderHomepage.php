<?php
function cmsHomepage() {
	$output = '<table>
				<tr><td>
					<form method="post" action="?menuoptie=homepage">
						<textarea name="textarea" id="styled"></textarea>
						<input type="submit" class="btnVeranderHomepage" value="Upload tekst" name="uploadtekst">
					</form>
				</td></tr>
				
				<tr><td>
					<form method="post" action="">
						<img src="images/homepage/brood.jpg">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeelding1">
					</form>
				</td>
				
				<td>
					<form method="post" action="">
						<img src="images/homepage/brood.jpg">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeelding2">
					</form>
				</td></tr>
				
				<tr><td>
					<form method="post" action="">
						<input type="submit" class="btnVeranderHomepage" value="terug naar homepage" name="terugHomepage">
					</form>
				</td></tr>
				</table>';

	if (isset($_POST['uploadtekst'])) {
		if (!empty($_POST['textarea'])) {
			$output = tekstVeranderHomepage();
		}
	}
	if (isset($_POST['terugHomepage'])) {
		unset($_POST['upload']);
	}
	return $output;
}

function tekstVeranderHomepage() {
	$valueTextarea = $_POST['textarea'];

	$query = 'UPDATE  `content`
		SET content="' . $valueTextarea . '" WHERE pagina="homepage" AND type="text"';
	$resultaat = mysql_query($query);
	unset($_POST['upload']);
}
