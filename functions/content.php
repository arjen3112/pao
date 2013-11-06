<?php

function GetContent()
{
    $content = "";
    if(isset($_GET['menuoptie'])){
        $content = $_GET['menuoptie'];
    }
    switch($content)
    {
        case 'homepage' :
            return homepage();
            break;
        
        case 'informatie' :
            return GetInformatie();
            break;
            
        case 'webshop' :
            return GetWebshop();
            break;
        
        case 'inloggen' :
            return logon();
            break;
            
        default :
            return homepage();
    }
}

function GetInformatie()
{
    $content = "informatie";
    return $content;
    
}

