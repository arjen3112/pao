<?php
function GetWebshop(){
    $output = loadwebshopmenu();
    if(isset($_GET['webshop'])){
    $output .= loadwebshopitems();
    }else{
        $output.="kies een menu item";
    }
    if(isset($_POST['wijzigitem'])||isset($_POST['wijziggegevens'])){
        $output = webshopwijzigen();
    }
    if(isset($_POST['bestellen'])||isset($_POST['afrekenen'])){
        $output = bestellen();
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
                        <input type="hidden" name="id" value="'.$row["id"].'"
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



function bestellen(){
    if (isset($_SESSION["profiel"]) && $_SESSION["profiel"] == "1"){
        if(isset($_POST['afrekenen'])){
            $account = $_SESSION['username'];
            $itemid = $_POST['id'];
            $itemnaam = $_POST['naam'];
            $waarde = $_POST['waarde'];
            $status = "wordt verwerkt";
            $output = "Uw bestelling wordt verwerkt!";
            $q ='INSERT INTO `bestellingen`(account, itemid, itemnaam, waarde, status) VALUES("'.$account.'","'.$itemid.'","'.$itemnaam.'","'.$waarde.'","'.$status.'")'; 
            mysql_query($q);   
        }else{
            $q ='SELECT * FROM `itemswebshop` WHERE `menuitem` = "'.$_GET['webshop'].'" AND `id` = "'.$_POST["id"].'"';
            $resultaat = mysql_query($q);
            $output = '<div id="webshopbestelcontainer">';
            while($row = mysql_fetch_array($resultaat)){
                $output .= '<div class="webshopitem">
                                <form method="post" action="">
                                <table>
                                <input type="hidden" name="id" value="'.$row["id"].'">
                                <input type="hidden" name="naam" value="'.$row["naam"].'">
                                <input type="hidden" name="waarde" value="'.$row["waarde"].'">
                                <tr><td colspan="2"><img src="'.$row["plaatje"].'"></td>
                                </tr>
                                <tr><td>'.$row["naam"].'</td><td>&#128 '.$row["waarde"].'</td><td style="width:100%;"><input type="submit" name="afrekenen" value="afrekenen" style="width:100%;"></td></tr>
                                </table>
                                </form>
                            </div>
                ';
            }
        }
        $output .= '</div>';
        }else{
            $output="U moet ingelogt zijn om iets te kunnen bestellen.";
        }
    return $output;
}

