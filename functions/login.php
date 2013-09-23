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
        session_destroy();
    }
    if(isset($_POST['user'])  && isset($_POST['pass']))
    {
        $query = 'SELECT `profiel`,`account` FROM `accounts`
                  WHERE `account` ="'.mysql_real_escape_string($_POST['user']).'" 
                  AND `password`  ="'.mysql_real_escape_string($_POST['pass']).'"';
                  
        $resultaat = mysql_query($query);
        $nummer_rows=mysql_num_rows($resultaat);
        $row = mysql_fetch_array($resultaat);
        
        
        if($nummer_rows==1)
        {
            $_SESSION['profiel']=$row['profiel'];
            $_SESSION['username']=$row['account'];
        }
    }
    
        if(!isset($_SESSION['profiel']))
        { 
            if(isset($_POST['registreren']))
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
            
            $output = getlogoff();
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
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>Wachtwoord: </td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login" class="button"></td>
            </tr>
            
        </form>
        <form method="post" action="?menuoptie=inloggen">
            <tr>
                <td><input type="submit" value="registreren" name="registreren" class="btnNoStyle"></td>
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
     <tr><td colspan="2"><form method="post" action="?menuoptie=inloggen">
     <input type="submit" name="logoff" class="button" value="logoff">
     </form></td></tr>
     </table>';
    
}

function getregistratie()
{
    $output = "anusbleker";
    return $output;
}


