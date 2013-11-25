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
					<form method="post" action="" enctype="multipart/form-data">
						<input type="file" value="Upload afbeelding" name="afbeelding1">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding1" name="uploadafbeelding1">
					</form>
				</td>
				
				</tr>
				<tr><td>
					<form method="post" action="" enctype="multipart/form-data">
						<input type="file" value="Upload afbeelding" name="afbeelding2">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding2" name="uploadafbeelding2">
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

	if (isset($_POST['uploadafbeelding1'])) {
		$output = veranderAfbeelding1();
	}

	if (isset($_POST['uploadafbeelding2'])) {
		$output = veranderAfbeelding2();
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
}

function veranderAfbeelding1() {
	if (!$_FILES['afbeelding1']['name'] == "") {

		$files = glob('images/homepage/afbeelding1/*');
		foreach ($files as $file) {
			if (is_file($file))
				unlink($file);
		}

		$photo = $_FILES['afbeelding1'];
		if (isset($_POST['uploadafbeelding1'])) {
			if (!is_uploaded_file($photo['name'])) {
				move_uploaded_file($photo['tmp_name'], "images/homepage/afbeelding1/" . $photo['name']);

				$query = 'UPDATE  `content`
		SET content="images/homepage/afbeelding1/' . $photo['name'] . '" WHERE id="2"';
				$resultaat = mysql_query($query);

			} else {
				echo 'Failed';
			}
		}
	} else {
		$output = "Afbeelding is leeg";
		return $output;
	}
}

function veranderAfbeelding2() {
	if (!$_FILES['afbeelding2']['name'] == "") {

		$files = glob('images/homepage/afbeelding2/*');
		foreach ($files as $file) {
			if (is_file($file))
				unlink($file);
		}

		$photo = $_FILES['afbeelding2'];
		if (isset($_POST['uploadafbeelding2'])) {
			if (!is_uploaded_file($photo['name'])) {
				move_uploaded_file($photo['tmp_name'], "images/homepage/afbeelding2/" . $photo['name']);

				$query = 'UPDATE  `content`
		SET content="images/homepage/afbeelding2/' . $photo['name'] . '" WHERE id="3"';
				$resultaat = mysql_query($query);

			} else {
				echo 'Failed';
			}
		}
	} else {
		$output = "Afbeelding is leeg";
		return $output;
	}
}
