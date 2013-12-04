<?php
function webshopwijzigen() {
	if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
		if (isset($_POST['wijziggegevens'])) {
			if (!empty($_POST['naamproduct']) && !empty($_POST['prijsproduct']) && !$_FILES['afbeelding']['name'] == "")
				$output = wijzigGegevens();
		}
		$q = 'SELECT * FROM `itemswebshop` WHERE `menuitem` = "' . $_GET['webshop'] . '" AND `id` = "' . $_POST["id"] . '"';
		$resultaat = mysql_query($q);
		$output = '<div id="webshopbestelcontainer">';
		while ($row = mysql_fetch_array($resultaat)) {
			$output .= '<div class="webshopitem">
                        <form method="post" action="">
                        <table>
                        <input type="hidden" name="id" value="' . $row["id"] . '">
                        <tr><td><img src="' . $row["plaatje"] . '"></td>
						<td><input type="file" value="Upload afbeelding" name="afbeelding"></td>
                        <td><input type="submit" class="btnVeranderHomepage" name="wijziggegevens" value="Wijzig gegevens"></td>
                        </tr>
                        <tr><td><input type="text" name="naamproduct" value="' . $row["naam"] . '"</td>
                        <td><input type="text" name="prijsproduct" value="&#128 ' . $row["waarde"] . '"</td><td style="width:100%;"></td></tr>
                        </table>
                        </form>
                    </div>';
		}

		$output .= '</div>';
	} else {
		$output = "U moet ingelogt zijn om iets te kunnen bestellen.";
	}

	function wijzigGegevens() {
		$files = glob('images/webshop/*');
		foreach ($files as $file) {
			if (is_file($file))
				unlink($file);
		}

		$photo = $_FILES['afbeelding'];
		if (isset($_POST['wijziggegevens'])) {
			if (!is_uploaded_file($photo['name'])) {
				move_uploaded_file($photo['tmp_name'], "images/webshop/" . $photo['name']);

				$query = 'UPDATE  `itemswebshop`
				SET plaatje="images/webshop/' . $photo['name'] . '" WHERE id="1"';
				$resultaat = mysql_query($query);

			} else {
				echo 'Failed';
			}
		}
	}

	return $output;
}
