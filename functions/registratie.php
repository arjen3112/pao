<?php
function getregistratie() {
    $check = 0;
    $output = '
<form method="post" action="?menuoptie=inloggen">
    <table id="tableLogin">
        <tr>
            <td>Gebruikersnaam: </td>
            <td>
            <input name="name" type="text" placeholder="Typ hier je naam"
            ';
    if (isset($_POST['name'])) {
        $output .= " value=\"" . $_POST['name'] . "\" ";
        $name = $_POST['name'];
        $pattern = '/^.*[a-zA-Z]$/';
        if (!preg_match($pattern, $name)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Wachwoord: </td>
            <td>
            <input name="password" type="password" placeholder="Typ hier je wachtwoord"
            ';
    if (isset($_POST['password'])) {
        $output .= " value=\"" . $_POST['password'] . "\"";
        $password = $_POST['password'];
        $pattern = '/^.*[a-zA-Z][0-9]$/';
        if (!preg_match($pattern, $password)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Wachwoord herhalen: </td>
            <td>
            <input name="password2" type="password" placeholder="Typ hier je wachtwoord"
            ';
    if (isset($_POST['password2'])) {
        $output .= " value=\"" . $_POST['password2'] . "\"";
        $password2 = $_POST['password2'];
        $pattern = $_POST['password'];
        if ($pattern !== $password2) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Emailadres: </td>
            <td>
            <input name="email" type="text" placeholder="bakker@example.com"
            ';
    if (isset($_POST['email'])) {
        $output .= " value=\"" . $_POST['email'] . "\"";
        $email = $_POST['email'];
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Adres: </td>
            <td>
            <input name="adres" type="text" placeholder="Straatnaam"
            ';
    if (isset($_POST['adres'])) {
        $output .= " value=\"" . $_POST['adres'] . "\"";
        $adres = $_POST['adres'];
        $pattern = '/^[A-Z]{1}[a-z]{4,500}$/';
        if (!preg_match($pattern, $adres)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Huisnummer: </td>
            <td>
            <input name="huisnummer" type="text" placeholder="Huisnummer"
            ';
    if (isset($_POST['huisnummer'])) {
        $output .= " value=\"" . $_POST['huisnummer'] . "\"";
        $huisnummer = $_POST['huisnummer'];
        $pattern = '/^.*[1-9][0-9]*$/';
        if (!preg_match($pattern, $huisnummer)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Postcode: </td>
            <td>
            <input name="postcode" type="text" placeholder="1234 AB"
            ';
    if (isset($_POST['postcode'])) {
        $output .= " value=\"" . $_POST['postcode'] . "\"";
        $postcode = $_POST['postcode'];
        $pattern = '/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i';
        if (!preg_match($pattern, $postcode)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Telefoon: </td>
            <td>
            <input name="telefoon" type="text" placeholder="0123-123456"
            ';
    if (isset($_POST['telefoon'])) {
        $output .= " value=\"" . $_POST['telefoon'] . "\"";
        $telefoon = $_POST['telefoon'];
        $telefoon = str_replace("-", "", $telefoon);
        $telefoon = str_replace(" ", "", $telefoon);
        $pattern = '/^[0-9]{4,12}$/';
        if (!preg_match($pattern, $telefoon)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="submit" name="submitregistreren" class="button" value="registreer">
            </td>
        </tr>
    </table>
</form>';
    if (isset($_POST['submitregistreren'])) {
        $voor = $_POST['name'];
        $wacht = $_POST['password'];
        $email = $_POST['email'];
        $adres = $_POST['adres'];
        $huisnummer = $_POST['huisnummer'];
        $postcode = $_POST['postcode'];
        $telefoon = $_POST['telefoon'];

        $query = mysql_query('SELECT * FROM `accounts` WHERE `account` ="' . $voor . '" OR `email` ="' . $email . '" OR `telefoon` ="' . $telefoon . '"');
        $nummer_rows = mysql_num_rows($query);
        if (!empty($nummer_rows)) {
            $output = registratieBestaat();
            $check = 1;
        }
        if (empty($check)) {
            $q = "INSERT INTO accounts
(account, password, email, profiel, adres, huisnummer, postcode, telefoon)
VALUES
('$voor','$wacht','$email','2','$adres','$huisnummer','$postcode','$telefoon')";
            mysql_query($q);
            $output = '
<table id="tableLogin">
    <form method="post" action="?menuoptie=inloggen">
        <tr>
            <td colspan="2" class="goed">Registratie succesvol</td>
        </tr>
        <tr>
            <td>Gebruikersnaam: </td>
            <td>
            <input type="text" name="user" placeholder="Typ hier je naam">
            </td>
        </tr>
        <tr>
            <td>Wachtwoord: </td>
            <td>
            <input type="password" name="pass" placeholder="Typ hier je wachtwoord">
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="submit" value="login" name="login" class="button">
            </td>
        </tr>

    </form>
    <form method="post" action="?menuoptie=inloggen">
        <tr>
            <td>
            <input type="submit" value="registreren?" name="registreren" class="btnNoStyle">
            </td>
        </tr>
    </form>
</table>';
        }
    }
    return $output;
}

function registratieBestaat() {
    $output = '
<form method="post" action="?menuoptie=inloggen">
    <table id="tableLogin">
        <tr>
            <td colspan="2" class="fout">Gebruikersnaam en/of email bestaat al</td>
        </tr>
        <tr>
            <td>Gebruikersnaam: </td>
            <td>
            <input name="name" type="text" placeholder="Typ hier je naam"
            ';
    if (isset($_POST['name'])) {
        $output .= " value=\"" . $_POST['name'] . "\" ";
        $name = $_POST['name'];
        $pattern = '/^.*[a-zA-Z]$/';
        if (!preg_match($pattern, $name)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Wachwoord: </td>
            <td>
            <input name="password" type="password" placeholder="Typ hier je wachtwoord"
            ';
    if (isset($_POST['password'])) {
        $output .= " value=\"" . $_POST['password'] . "\"";
        $password = $_POST['password'];
        $pattern = '/^.*[a-zA-Z][0-9]$/';
        if (!preg_match($pattern, $password)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Wachwoord herhalen: </td>
            <td>
            <input name="password2" type="password" placeholder="Typ hier je wachtwoord"
            ';
    if (isset($_POST['password2'])) {
        $output .= " value=\"" . $_POST['password2'] . "\"";
        $password2 = $_POST['password2'];
        $pattern = $_POST['password'];
        if ($pattern !== $password2) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Emailadres: </td>
            <td>
            <input name="email" type="text" placeholder="bakker@example.com"
            ';
    if (isset($_POST['email'])) {
        $output .= " value=\"" . $_POST['email'] . "\"";
        $email = $_POST['email'];
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Adres: </td>
            <td>
            <input name="adres" type="text" placeholder="Straatnaam"
            ';
    if (isset($_POST['adres'])) {
        $output .= " value=\"" . $_POST['adres'] . "\"";
        $adres = $_POST['adres'];
        $pattern = '/^[A-Z]{1}[a-z]{4,500}$/';
        if (!preg_match($pattern, $adres)) {
            $output .= "style=\"border:2px solid red;\" ";
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Huisnummer: </td>
            <td>
            <input name="huisnummer" type="text" placeholder="Huisnummer"
            ';
    if (isset($_POST['huisnummer'])) {
        $output .= " value=\"" . $_POST['huisnummer'] . "\"";
        $huisnummer = $_POST['huisnummer'];
        $pattern = '/^.*[1-9][0-9]*$/';
        if (!preg_match($pattern, $huisnummer)) {
            $output .= "style=\"border:2px solid red;\" ";
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Postcode: </td>
            <td>
            <input name="postcode" type="text" placeholder="1234 AB"
            ';
    if (isset($_POST['postcode'])) {
        $output .= " value=\"" . $_POST['postcode'] . "\"";
        $postcode = $_POST['postcode'];
        $pattern = '/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i';
        if (!preg_match($pattern, $postcode)) {
            $output .= "style=\"border:2px solid red;\" ";
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Telefoon: </td>
            <td>
            <input name="telefoon" type="text" placeholder="0123-123456"
            ';
    if (isset($_POST['telefoon'])) {
        $output .= " value=\"" . $_POST['telefoon'] . "\"";
        $telefoon = $_POST['telefoon'];
        $telefoon = str_replace("-", "", $telefoon);
        $telefoon = str_replace(" ", "", $telefoon);
        $pattern = '/^[0-9]{4,12}$/';
        if (!preg_match($pattern, $telefoon)) {
            $output .= "style=\"border:2px solid red;\" ";
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="submit" name="submitregistreren" class="button" value="registreer">
            </td>
        </tr>
    </table>
</form>';
    return $output;
}

function getaccountgegevens() {
    $output = '
<table id="tableLogin">
    <form method="post" action="?menuoptie=inloggen&loginoptie=account">
        <tr>
            <td>Gebruikersnaam: </td>
            <td> ' . $_SESSION['username'] . '</td>
        </tr>
        <tr>
            <td>Wachtwoord: </td>
            <td>****</td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>' . $_SESSION['email'] . '</td>
        </tr>
        <tr>
            <td>Adres: </td>
            <td>' . $_SESSION['adres'] . '</td>
        </tr>
        <tr>
            <td>Huisnummer: </td>
            <td>' . $_SESSION['huisnummer'] . '</td>
        </tr>
        <tr>
            <td>Postcode: </td>
            <td>' . $_SESSION['postcode'] . '</td>
        </tr>
        <tr>
            <td>Telefoon: </td>
            <td>' . $_SESSION['telefoon'] . '</td>
        </tr>
        <tr>
            <td>
            <input type="submit" class="button" name="submitwijzigingadres" value="Wijzig gegevens" style="width:175px;">
            </td>
            <td>
            <input type="submit" class="button" name="submitwijzigingwachtwoord" value="Wijzig wachtwoord" style="width:175px;">
            </td>
        </tr>
    </form>
</table>
';
    return $output;
}

function getwijzigingadres() {
    $check = 0;
    $output = '';
    $output = '
    
<form method="post" action="?menuoptie=inloggen&loginoptie=account">
    <table id="tableLogin">
        <tr>
            <td>Gebruikersnaam: </td>
            <td>
                ' . $_SESSION["username"] . '
            </td>
        </tr>
        <tr>
            <td>Emailadres: </td>
            <td>
            <input name="email" type="text" value="' . $_SESSION["email"] . '"
            ';
    if (isset($_POST['email'])) {
        $output .= " value=\"" . $_POST['email'] . "\"";
        $email = $_POST['email'];
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Adres: </td>
            <td>
            <input name="adres" type="text" value="' . $_SESSION["adres"] . '"
            ';
    if (isset($_POST['adres'])) {
        $output .= " value=\"" . $_POST['adres'] . "\"";
        $adres = $_POST['adres'];
        $pattern = '/^[A-Z]{1}[a-z]{4,500}$/';
        if (!preg_match($pattern, $adres)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Huisnummer: </td>
            <td>
            <input name="huisnummer" type="text" value="' . $_SESSION["huisnummer"] . '"
            ';
    if (isset($_POST['huisnummer'])) {
        $output .= " value=\"" . $_POST['huisnummer'] . "\"";
        $huisnummer = $_POST['huisnummer'];
        $pattern = '/^.*[1-9][0-9]*$/';
        if (!preg_match($pattern, $huisnummer)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Postcode: </td>
            <td>
            <input name="postcode" type="text" value="' . $_SESSION["postcode"] . '"
            ';
    if (isset($_POST['postcode'])) {
        $output .= " value=\"" . $_POST['postcode'] . "\"";
        $postcode = $_POST['postcode'];
        $pattern = '/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i';
        if (!preg_match($pattern, $postcode)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Telefoon: </td>
            <td>
            <input name="telefoon" type="text" value="' . $_SESSION["telefoon"] . '"
            ';
    if (isset($_POST['telefoon'])) {
        $output .= " value=\"" . $_POST['telefoon'] . "\"";
        $telefoon = $_POST['telefoon'];
        $telefoon = str_replace("-", "", $telefoon);
        $telefoon = str_replace(" ", "", $telefoon);
        $pattern = '/^[0-9]{4,12}$/';
        if (!preg_match($pattern, $telefoon)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="' . $_SESSION['id'] . '">
            <input type="submit" name="submitwijzigadres" class="button" value="Wijzig gegevens">
            </td>
        </tr>
    </table>
</form>';
    if (isset($_POST['submitwijzigadres'])) {

        
        $id = $_POST['id'];
        $email = $_POST['email'];
        $adres = $_POST['adres'];
        $huisnummer = $_POST['huisnummer'];
        $postcode = $_POST['postcode'];
        $telefoon = $_POST['telefoon'];

        $query = mysql_query('SELECT * FROM `accounts` WHERE `email` ="' . $email . '"');
        $nummer_rows = mysql_num_rows($query);

        if (!empty($nummer_rows) && $email != $_SESSION['email']) {
            $output = getwijzigingbestaat();
            $check = 1;
        }
        if (empty($check)) {
            //echo"test empty check";
            $q = "UPDATE accounts
                  SET email = '" . $email . "', adres = '" . $adres . "', huisnummer = '" . $huisnummer . "', postcode = '" . $postcode . "', telefoon = '" . $telefoon . "'
                  WHERE id = '" . $id . "'
                  
                  ";
            mysql_query($q);
            $_SESSION['email'] = $email;
            $_SESSION['adres'] = $adres;
            $_SESSION['huisnummer'] = $huisnummer;
            $_SESSION['postcode'] = $postcode;
            $_SESSION['telefoon'] = $telefoon;
            $output = '
            <table id="tableLogin">
                <form method="post" action="?menuoptie=inloggen&loginoptie=account">
                    <tr>
                        <td style="color:green;">
                        wijziging succesvol!
                        </td>
                    </tr>
                    <tr>
                        <td>Gebruikersnaam: </td>
                        <td> ' . $_SESSION['username'] . '</td>
                    </tr>
                    <tr>
                        <td>Wachtwoord: </td>
                        <td>****</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>' . $_SESSION['email'] . '</td>
                    </tr>
                    <tr>
                        <td>Adres: </td>
                        <td>' . $_SESSION['adres'] . '</td>
                    </tr>
                    <tr>
                        <td>Huisnummer: </td>
                        <td>' . $_SESSION['huisnummer'] . '</td>
                    </tr>
                    <tr>
                        <td>Postcode: </td>
                        <td>' . $_SESSION['postcode'] . '</td>
                    </tr>
                    <tr>
                        <td>Telefoon: </td>
                        <td>' . $_SESSION['telefoon'] . '</td>
                    </tr>
                </form>
            </table>
            ';
        }
    }

    return $output;
}

function getwijzigingbestaat() {
    $check = 0;
    $output = '
<form method="post" action="?menuoptie=inloggen&loginoptie=account">
    <table id="tableLogin">
        <tr>
            <td colspan="2" class="fout">Email bestaat al</td>
        </tr>
        <tr>
            <td>Gebruikersnaam: </td>
            <td>
                ' . $_SESSION["username"] . '
            </td>
        </tr>
        <tr>
            <td>Emailadres: </td>
            <td>
            <input name="email" type="text" value="' . $_SESSION["email"] . '"
            ';
    if (isset($_POST['email'])) {
        $output .= " value=\"" . $_POST['email'] . "\"";
        $email = $_POST['email'];
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Adres: </td>
            <td>
            <input name="adres" type="text" value="' . $_SESSION["adres"] . '"
            ';
    if (isset($_POST['adres'])) {
        $output .= " value=\"" . $_POST['adres'] . "\"";
        $adres = $_POST['adres'];
        $pattern = '/^[A-Z]{1}[a-z]{4,500}$/';
        if (!preg_match($pattern, $adres)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Huisnummer: </td>
            <td>
            <input name="huisnummer" type="text" value="' . $_SESSION["huisnummer"] . '"
            ';
    if (isset($_POST['huisnummer'])) {
        $output .= " value=\"" . $_POST['huisnummer'] . "\"";
        $huisnummer = $_POST['huisnummer'];
        $pattern = '/^.*[1-9][0-9]*$/';
        if (!preg_match($pattern, $huisnummer)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Postcode: </td>
            <td>
            <input name="postcode" type="text" value="' . $_SESSION["postcode"] . '"
            ';
    if (isset($_POST['postcode'])) {
        $output .= " value=\"" . $_POST['postcode'] . "\"";
        $postcode = $_POST['postcode'];
        $pattern = '/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i';
        if (!preg_match($pattern, $postcode)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td>Telefoon: </td>
            <td>
            <input name="telefoon" type="text" value="' . $_SESSION["telefoon"] . '"
            ';
    if (isset($_POST['telefoon'])) {
        $output .= " value=\"" . $_POST['telefoon'] . "\"";
        $telefoon = $_POST['telefoon'];
        $telefoon = str_replace("-", "", $telefoon);
        $telefoon = str_replace(" ", "", $telefoon);
        $pattern = '/^[0-9]{4,12}$/';
        if (!preg_match($pattern, $telefoon)) {
            $output .= "style=\"border:2px solid red;\" ";
            $check = 1;
        }
    }
    $output .= '/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="' . $_SESSION['id'] . '">
            <input type="submit" name="submitwijzigadres" class="button" value="Wijzig gegevens">
            </td>
        </tr>
    </table>
</form>';
return $output;
}

function wijzigwachtwoord()
{
	  $output = '
	<table id="tableLogin">
		<form method="post" action="?menuoptie=inloggen&loginoptie=account">
			<tr>
				<td>Gebruikersnaam: </td>
				<td>
				'.$_SESSION["username"].'
				<input type="hidden" name="user" value="'.$_SESSION["username"].'">
				</td>
			</tr>
			<tr>
				<td>Wachtwoord: </td>
				<td>
				<input type="password" name="pass" placeholder="Typ hier je wachtwoord">
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="submit" value="Login" name="checkwachtwoord" class="button">
				</td>
			</tr>
		</form>
	</table>
	';
	    return $output;
	
	if (isset($_POST['checkwachtwoord']))
	{
		$output = '
		<table id="tableCheckWachtwoord">
			<form method="post" action="?menuoptie=inloggen&loginoptie=account">
				<tr>
					<td>U bent ingelogd</td>
				</tr>
			</form>
		</table>';
	}
}
