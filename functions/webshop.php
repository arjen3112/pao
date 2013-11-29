<?php
function GetWebshop(){
    $output = loadwebshopmenu();
    if(isset($_GET['webshop'])){
    $output .= loadwebshopitems();
    }else{
        $output.="kies een menu item";
    }
    return $output;
}

function loadwebshopmenu(){
    $output = '<div id="webshopmenu">';
    $q ='SELECT * FROM `menuitemswebshop`';
    $resultaat = mysql_query($q);
    while($row = mysql_fetch_array($resultaat)){
        $output .= '<a href="'.$row["href"].'">'.$row["item"].'</a><br>';
    }
    $output .= '</div>';
    return $output;
}

function loadwebshopitems(){
    $q ='SELECT * FROM `itemswebshop` WHERE `menuitem` = "'.$_GET['webshop'].'"';
    $resultaat = mysql_query($q);
    $output = '<div id="webshopitemcontainer">';
    while($row = mysql_fetch_array($resultaat)){
        $output .= '<div class="webshopitem">
                        <form method="post" action="">
                        <table>
                        <input type="hidden" value="'.$row["id"].'"
                        <tr><td colspan="2"><img src="'.$row["plaatje"].'"></td>';
                        if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1") {
                            $output .='<td><input type="submit" name="wijzigitem" value="wijzig item" style="width:100%;"></td>';
                        }
                        $output.='</tr>
                        <tr><td>'.$row["naam"].'</td><td>&#128 '.$row["waarde"].'</td><td style="width:100%;"><input type="submit" name="bestellen" value="bestel" style="width:100%;"></td></tr>
                        </table>
                        </form>
                    </div>
        ';
    }
    $output .= '</div>';
    return $output;
}
