<?php
function cmsInformatie(){

	$output = '<table>
				<tr><td>
					<form method="post" action="" enctype="multipart/form-data">
						<input type="file" value="Upload afbeelding" name="afbeelding">
						<input type="submit" class="btnVeranderHomepage" value="Upload afbeelding" name="uploadafbeeldingInfo">
					</form>
				</td></tr>
				
				<tr><td>
					<form method="post" action="?menuoptie=informatie">
						<textarea name="textarea1" id="styled"></textarea>
						<input type="submit" class="btnVeranderHomepage" value="Upload tekst1" name="uploadtekst1">
					</form>
				</td></tr>
				
				<tr><td>
					<form method="post" action="?menuoptie=informatie">
						<textarea name="textarea2" id="styled"></textarea>
						<input type="submit" class="btnVeranderHomepage" value="Upload tekst2" name="uploadtekst2">
					</form>
				</td></tr>
				</table>';
				
	if (isset($_POST['uploadafbeeldingInfo'])) {
		if (!$_FILES['afbeelding']['name'] == "") {
			$output = veranderAfbeelding();
		}
	}
	
	if (isset($_POST['uploadtekst1'])) {
		if (!empty($_POST['textarea1'])) {
			$output = tekstVeranderInfo1();
		}
	}
	
	if (isset($_POST['uploadtekst2'])) {
		if (!empty($_POST['textarea2'])) {
			$output = tekstVeranderInfo2();
		}
	}

	if (isset($_POST['terugInformatie'])) {
		unset($_POST['veranderContent']);
	}
	return $output;
}

function veranderAfbeelding(){
	$files = glob('images/informatie/*');
	foreach ($files as $file) {
		if (is_file($file))
			unlink($file);
	}

	$photo = $_FILES['afbeelding'];
	if (isset($_POST['uploadafbeeldingInfo'])) {
		if (!is_uploaded_file($photo['name'])) {
			move_uploaded_file($photo['tmp_name'], "images/informatie/" . $photo['name']);

			$query = 'UPDATE  `content`
		SET content="images/informatie/' . $photo['name'] . '" WHERE id="5"';
			$resultaat = mysql_query($query);

		} else {
			echo 'Failed';
		}
	}
}

function tekstVeranderInfo1(){
	$valueTextarea = $_POST['textarea1'];

	$query = 'UPDATE  `content`
		SET content="' . $valueTextarea . '" WHERE id="4"';
	$resultaat = mysql_query($query);
}

function tekstVeranderInfo2(){
	$valueTextarea = $_POST['textarea2'];

	$query = 'UPDATE  `content`
		SET content="' . $valueTextarea . '" WHERE id="6"';
	$resultaat = mysql_query($query);
}