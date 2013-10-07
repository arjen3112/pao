<?php

session_start();
function logon()
{
    
    $output = "";
    if(isset($_POST['logoff']))
    {
       
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
            );
         }
    }
    if(isset($_POST['user'])  && isset($_POST['pass']))
    {
        $query = 'SELECT `profiel`,`account` FROM `accounts`
                  WHERE `account` ="'.mysql_real_escape_string($_POST['user']).'" 
                  AND `password`  ="'.mysql_real_escape_string($_POST['pass']).'"';
                  
        $resultaat = mysql_query($query);
        $nummer_rows=mysql_num_rows($resultaat);
        $row = mysql_fetch_array($resultaat);      
        
		if($nummer_rows == 0)
		{
			$output = '
        <table id="tableLogin">
        <form method="post" action="?menuoptie=inloggen">
        	<tr>
        	<td colspan="2" class="fout">Wachtwoord en/of gebruikersnaam is onjuist ingevoerd</td>
        	</tr>
            <tr>
                <td>Gebruikersnaam: </td>
                <td><input type="text" name="user" placeholder="Typ hier je naam" value='.$_POST['user'].'></td>
            </tr>
            <tr>
                <td>Wachtwoord: </td>
                <td><input type="password" name="pass" placeholder="Typ hier je wachtwoord" value='.$_POST['pass'].'></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login" class="button"></td>
            </tr>
            
        </form>
        <form method="post" action="?menuoptie=inloggen">
            <tr>
                <td><input type="submit" value="registreren?" name="registreren" class="btnNoStyle"></td>
            </tr>
        </form>
        </table>
        ';
        return $output;
		}
		
		elseif($nummer_rows==1)
        {
            $_SESSION['profiel']=$row['profiel'];
            $_SESSION['username']=$row['account'];
        }
    }
    
        if(!isset($_SESSION['profiel']))
        { 
            if(isset($_POST['registreren'])||isset($_POST['submitregistreren']))
            {
                $output = getregistratie();    
            }
            else
            {
                $output = getlogon();
            }  
        }
        elseif($_SESSION['profiel'] >="1")
        {
            if(isset($_GET['loginoptie']) && $_GET['loginoptie'] == "account")
            {
                $output = getaccountgegevens();
            }
            elseif(isset($_GET['loginoptie']) && $_GET['loginoptie'] == "bestellingen")
            {
                $output = getbestellingen();
            }
            else
            {
            $output = getlogoff();
            }
        }
        
        return $output;
    
    
}

function getlogon()
{
    $output = '
        <table id="tableLogin">
        <form method="post" action="?menuoptie=inloggen">
            <tr>
                <td>Gebruikersnaam: </td>
                <td><input type="text" name="user" placeholder="Typ hier je naam"></td>
            </tr>
            <tr>
                <td>Wachtwoord: </td>
                <td><input type="password" name="pass" placeholder="Typ hier je wachtwoord"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login" name="login" class="button"></td>
            </tr>
            
        </form>
        <form method="post" action="?menuoptie=inloggen">
            <tr>
                <td><input type="submit" value="registreren?" name="registreren" class="btnNoStyle"></td>
            </tr>
        </form>
        </table>
        ';
        return $output;
    
}
function getlogoff()
{
    
    return
     '
     <table id="tableLogin">
     <tr><td>Welkom '.$_SESSION['username'].'</td></tr>
     </table>';
    
}

function getloginfout(){
    
}

function getregistratie()
{
	$check = 0;
    $output = '
    <form method="post" action="?menuoptie=inloggen">
    	<table id="tableLogin">
    		<tr>
    			<td>Gebruikersnaam: </td>
    			<td><input name="name" type="text" placeholder="Typ hier je naam"
			';
			if(isset($_POST['name']))
			{
				$output .= " value=\"". $_POST['name'] ."\" ";
				$name = $_POST['name'];
				$pattern = '/^.*[a-zA-Z]$/';
				if(!preg_match($pattern,$name))
				{
					$output.= "style=\"border:2px solid red;\" ";
					$check=1;
				}
			}
			$output.='/></td>
    		</tr>
    		<tr>
    			<td>Wachwoord: </td>
    			<td><input name="password" type="password" placeholder="Typ hier je wachtwoord"
			';
			if(isset($_POST['password']))
			{
				$output .= " value=\"". $_POST['password'] ."\"";
				$password = $_POST['password'];
				$pattern = '/^.*[a-zA-Z][0-9]$/';
				if(!preg_match($pattern,$password))
				{
					$output.= "style=\"border:2px solid red;\" ";
					$check=1;
				}
			}
			$output.='/></td>
    		</tr>
    		<tr>
    			<td>Wachwoord herhalen: </td>
    			<td><input name="password2" type="password" placeholder="Typ hier je wachtwoord"
			';
			if(isset($_POST['password2']))
			{
				$output .= " value=\"". $_POST['password2'] ."\"";
				$password2 = $_POST['password2'];
				$pattern = $_POST['password'];
				if($pattern !== $password2)
				{
					$output.= "style=\"border:2px solid red;\" ";
					$check=1;
				}
			}
			$output.='/></td>
    		</tr>
    		<tr>
    			<td>Emailadres: </td>
    			<td><input name="email" type="text" placeholder="bakker@example.com"
			';
			if(isset($_POST['email']))
			{
				$output .= " value=\"". $_POST['email'] ."\"";
				$email = $_POST['email'];
				if(!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
				{
					$output.= "style=\"border:2px solid red;\" ";
					$check=1;
				}
			}
			$output.='/></td>
    		</tr>
    		<tr><td colspan="2">
    		<input type="submit" name="submitregistreren" class="button" value="registreer">
    		</td></tr>
    	</table>
    </form>';
	if(isset($_POST['submitregistreren']))
		{
		    $voor = $_POST['name'];
            $wacht = $_POST['password'];
            $email = $_POST['email'];
            
		    $query = mysql_query('SELECT * FROM `accounts` WHERE `account` ="'.$voor.'" OR `email` ="'.$email.'"');   
            $nummer_rows=mysql_num_rows($query);
            if(!empty($nummer_rows)){
                $output = registratieBestaat();
                $check=1;
            }            
			if(empty($check)){
    			$q = "INSERT INTO accounts
    					(account, password, email, profiel)
    					VALUES
    					('$voor','$wacht','$email','2')";
    			mysql_query($q);
                $output = '
			        <table id="tableLogin">
			        <form method="post" action="?menuoptie=inloggen">
			        	<tr><td colspan="2" class="goed">Registratie succesvol</td></tr>
			            <tr>
			                <td>Gebruikersnaam: </td>
			                <td><input type="text" name="user" placeholder="Typ hier je naam"></td>
			            </tr>
			            <tr>
			                <td>Wachtwoord: </td>
			                <td><input type="password" name="pass" placeholder="Typ hier je wachtwoord"></td>
			            </tr>
			            <tr>
			                <td colspan="2"><input type="submit" value="login" name="login" class="button"></td>
			            </tr>
			            
			        </form>
			        <form method="post" action="?menuoptie=inloggen">
			            <tr>
			                <td><input type="submit" value="registreren?" name="registreren" class="btnNoStyle"></td>
			            </tr>
			        </form>
			        </table>';
            }
		}
    return $output;
}

function registratieBestaat(){
    $output = '
    <form method="post" action="?menuoptie=inloggen">
        <table id="tableLogin">
            <tr><td colspan="2" class="fout">Gebruikersnaam en/of email bestaat al</td></tr>
            <tr>
                <td>Gebruikersnaam: </td>
                <td><input name="name" type="text" placeholder="Typ hier je naam"
            ';
            if(isset($_POST['name']))
            {
                $output .= " value=\"". $_POST['name'] ."\" ";
                $name = $_POST['name'];
                $pattern = '/^.*[a-zA-Z]$/';
                if(!preg_match($pattern,$name))
                {
                    $output.= "style=\"border:2px solid red;\" ";
                    $check=1;
                }
            }
            $output.='/></td>
            </tr>
            <tr>
                <td>Wachwoord: </td>
                <td><input name="password" type="password" placeholder="Typ hier je wachtwoord"
            ';
            if(isset($_POST['password']))
            {
                $output .= " value=\"". $_POST['password'] ."\"";
                $password = $_POST['password'];
                $pattern = '/^.*[a-zA-Z][0-9]$/';
                if(!preg_match($pattern,$password))
                {
                    $output.= "style=\"border:2px solid red;\" ";
                    $check=1;
                }
            }
            $output.='/></td>
            </tr>
            <tr>
                <td>Wachwoord herhalen: </td>
                <td><input name="password2" type="password" placeholder="Typ hier je wachtwoord"
            ';
            if(isset($_POST['password2']))
            {
                $output .= " value=\"". $_POST['password2'] ."\"";
                $password2 = $_POST['password2'];
                $pattern = $_POST['password'];
                if($pattern !== $password2)
                {
                    $output.= "style=\"border:2px solid red;\" ";
                    $check=1;
                }
            }
            $output.='/></td>
            </tr>
            <tr>
                <td>Emailadres: </td>
                <td><input name="email" type="text" placeholder="bakker@example.com"
            ';
            if(isset($_POST['email']))
            {
                $output .= " value=\"". $_POST['email'] ."\"";
                $email = $_POST['email'];
                if(!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
                {
                    $output.= "style=\"border:2px solid red;\" ";
                    $check=1;
                }
            }
            $output.='/></td>
            </tr>
            <tr><td colspan="2">
            <input type="submit" name="submitregistreren" class="button" value="registreer">
            </td></tr>
        </table>
    </form>';
    return $output;
}

function getaccountgegevens()
{
    $output= "hallo";
    return $output;
}

function getbestellingen()
{
    $output= "hallo2";
    return $output;
} 
