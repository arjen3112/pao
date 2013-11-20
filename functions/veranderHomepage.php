<?php
function cmsHomepage() {
	$output = '<table>
				<tr><td>
					<form method="post" action="">
						<textarea name="textarea" id="styled"></textarea>
						<input type="submit" class="btnVeranderHomepage" value="Upload tekst" name="uploadtekst">
					</form>
				</td></tr>
				
				<tr><td>
					<form method="post" action="">
						<img src="images/homepage/brood.jpg">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeelding1">
					</form>
				</td></tr>
				
				<td>
					<form method="post" action="">
						<img src="images/homepage/brood.jpg">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeelding2">
					</form>
				</td>
				
				<tr><td>
					<form method="post" action="">
						<input type="submit" class="btnVeranderHomepage" value="terug naar homepage" name="terugHomepage">
					</form>
				</td></tr>
				</table>';

	if (isset($_POST['uploadtekst'])) {
		echo "uploadtekst isset";
		if (!empty($_POST['textarea'])) {
			echo "textarea isset";
			$output = tekstVeranderHomepage();
		}
	}

	if (isset($_POST['terugHomepage'])) {
		unset($_POST['upload']);
	}
	return $output;
}

function tekstVeranderHomepage() {
	echo "adsasdsa";
}
