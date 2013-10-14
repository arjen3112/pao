<?php session_start();
function logon() {

    $output = "";
    if (isset($_POST['logoff'])) {

        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
    }
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $query = 'SELECT * FROM `accounts`
WHERE `account` ="' . mysql_real_escape_string($_POST['user']) . '"
AND `password`  ="' . mysql_real_escape_string($_POST['pass']) . '"';

        $resultaat = mysql_query($query);
        $nummer_rows = mysql_num_rows($resultaat);
        $row = mysql_fetch_array($resultaat);

        if ($nummer_rows == 0) {
            $output = '
<table id="tableLogin">
	<form method="post" action="?menuoptie=inloggen">
		<tr>
			<td colspan="2" class="fout">Wachtwoord en/of gebruikersnaam is onjuist ingevoerd</td>
		</tr>
		<tr>
			<td>Gebruikersnaam: </td>
			<td>
			<input type="text" name="user" placeholder="Typ hier je naam" value=' . $_POST['user'] . '>
			</td>
		</tr>
		<tr>
			<td>Wachtwoord: </td>
			<td>
			<input type="password" name="pass" placeholder="Typ hier je wachtwoord" value=' . $_POST['pass'] . '>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="submit" value="login" class="button">
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
</table>
';
            return $output;
        } elseif ($nummer_rows == 1) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['profiel'] = $row['profiel'];
            $_SESSION['username'] = $row['account'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['adres'] = $row['adres'];
            $_SESSION['huisnummer'] = $row['huisnummer'];
            $_SESSION['postcode'] = $row['postcode'];
            $_SESSION['telefoon'] = $row['telefoon'];
        }
    }

    if (!isset($_SESSION['profiel'])) {
        if (isset($_POST['registreren']) || isset($_POST['submitregistreren'])) {
            $output = getregistratie();
        } else {
            $output = getlogon();
        }
    } elseif ($_SESSION['profiel'] >= "1") {
        if (isset($_GET['loginoptie']) && $_GET['loginoptie'] == "account") {
            if (isset($_POST['submitwijzigingadres']) || isset($_POST['submitwijzigadres'])) {
                $output = getwijzigingadres();
            }else
            {
                $output = getaccountgegevens();
            }
            
        } elseif (isset($_GET['loginoptie']) && $_GET['loginoptie'] == "bestellingen") {
            $output = getbestellingen();
        } else {
            $output = getlogoff();
        }
    }

    return $output;

}

function getlogon() {
    $output = '
<table id="tableLogin">
	<form method="post" action="?menuoptie=inloggen">
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
</table>
';
    return $output;

}

function getlogoff() {

    return '
<table id="tableLogin">
	<tr>
		<td>Welkom ' . $_SESSION['username'] . '</td>
	</tr>
</table>';

}



function getbestellingen() {
    $output = "Bestellingsscherm binnenkort beschikbaar";
    return $output;
}
