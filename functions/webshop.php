<?php
function GetWebshop(){
    $output = loadwebshopmenu();
    
    return $output;
}

function loadwebshopmenu(){
    $output = '<div id="webshopmenu">';
    $q ='SELECT * FROM `menuitemswebshop`';
    $resultaat = mysql_query($q);
    $nummer_rows = mysql_num_rows($resultaat);
    while($row = mysql_fetch_array($resultaat)){
        $output .= '<a href="'.$row["href"].'">'.$row["item"].'</a><br>';
    }
    return $output;
}
