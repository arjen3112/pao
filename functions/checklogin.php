<?php
function checklogin() {
    $nummer_rows = 0;
    
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
    if (isset($_POST['login'])) {
        $query = 'SELECT `profiel`,`account` FROM `accounts`
                  WHERE `account` ="' . mysql_real_escape_string($_POST['user']) . '" 
                  AND `password`  ="' . mysql_real_escape_string($_POST['pass']) . '"';

        $resultaat = mysql_query($query);
        $nummer_rows = mysql_num_rows($resultaat);
        $row = mysql_fetch_array($resultaat);
        if ($nummer_rows == 1) {
            $_SESSION['profiel'] = $row['profiel'];
            $_SESSION['username'] = $row['account'];
        }
    }
}
