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
            return GetHomepage();
            break;
        
        case 'informatie' :
            return GetInformatie();
            break;
            
        case 'webshop' :
            return GetWebshop();
            break;
        
        case 'inloggen' :
            return GetInloggen();
            break;
            
        default :
            return GetHomepage();
    }
}

function GetHomepage()
{
   $content = "homepage";
    return $content;
     
}

function GetInformatie()
{
    $content = "informatie";
    return $content;
    
}

function GetWebshop()
{
    $content = "webshop";
    return $content;
    
}

function GetInloggen()
{
    $content = "inloggen";
    return $content;
    
}
