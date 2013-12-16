<?php
function webshopwijzigen() {
	if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
		$q = 'SELECT * FROM `itemswebshop` WHERE `menuitem` = "' . $_GET['webshop'] . '" AND `id` = "' . $_POST["id"] . '"';
		$resultaat = mysql_query($q);
		$output = '<div id="webshopbestelcontainer">';
		while ($row = mysql_fetch_array($resultaat)) {
			$output .= '<div class="webshopitem">
                        <form method="post" action="" enctype="multipart/form-data">
                        <table>
                        <input type="hidden" name="id" value="' . $row["id"] . '">
                        
                        <tr><td><img src="' . $row["plaatje"] . '"></td>
						<td><input type="file" value="Upload afbeelding" name="afbeelding"></td>
                        <td><input type="submit" class="btnVeranderHomepage" name="wijziggegevens" value="Wijzig gegevens"></td></tr>
                        
                        <tr><td><input type="text" name="naamproduct" value="' . $row["naam"] . '"</td>
                        <td><input type="text" name="prijsproduct" value="&#128 ' . $row["waarde"] . '"</td><td style="width:100%;"></td></tr>
                        <tr><td><input type="submit" class="btnVeranderHomepage" name="verwijderproduct" value="verwijder product"></td></tr>
                        </table>
                        </form>
                    </div>';
		}

		$output .= '</div>';
	} else {
		$output = "U moet ingelogt zijn om iets te kunnen wijzigen.";
	}

	if (isset($_POST['wijziggegevens'])) {
		if (!empty($_POST['naamproduct']) && !$_FILES['afbeelding']['name'] == "")
			$output = wijzigafbeelding();
	}

	if (isset($_POST['verwijderproduct'])) {
		$output = verwijderproduct();
	}
	return $output;
}

function wijzigafbeelding() {

	$photo = $_FILES['afbeelding'];
	if (isset($_POST['wijziggegevens'])) {
		if (!is_uploaded_file($photo['name'])) {
			move_uploaded_file($photo['tmp_name'], "images/webshop/" . $photo['name']);
			$q = 'SELECT `plaatje` FROM `itemswebshop` WHERE id="' . $_POST['id'] . '"';
			$resultaat = mysql_query($q);
			$row = mysql_fetch_array($resultaat);
			$files = glob($row[0]);
			foreach ($files as $file) {
				if (is_file($file))
					unlink($file);
			}
			$query = 'UPDATE  `itemswebshop`
				SET plaatje="images/webshop/' . $photo['name'] . '" WHERE id="' . $_POST['id'] . '"';
			mysql_query($query);

		} else {
			echo 'Failed';
		}

		$naam = $_POST['naamproduct'];
		$id = $_POST['id'];

		$query = 'UPDATE `itemswebshop`
                  SET naam = ' . $naam . '
				  WHERE id = ' . $id . '';
		mysql_query($query);
		echo "Wijziging succesvol";
	}
}

function verwijderproduct() {
	$q = 'DELETE FROM `itemswebshop` WHERE `id`="' . $_POST['id'] . '"';
	mysql_query($q);
}
