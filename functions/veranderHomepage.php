<?php
function cmsHomepage() {
	$output = '<form method="post" action="?menuoptie=homepage">
				<input type="submit" class="btnVeranderHomepage" value="Upload tekst" name="uploadtekst">
				<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeelding1">
				<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeelding2">
				<input type="submit" class="btnVeranderHomepage" value="terug naar homepage" name="terugHomepage">
				</form>';

	if (isset($_POST['uploadtekst'])) {
		$output = "abc";
	}
	
	if (isset($_POST['terugHomepage'])) {
		$output = homepage();
	}
	return $output;
}
