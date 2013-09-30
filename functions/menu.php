<?php

function menu(){
    if(isset($_GET['menuoptie'])){
        switch($_GET['menuoptie']){
            case 'homepage' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="menuGeselecteerd">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>';
                       if(isset($_SESSION["profiel"]) && $_SESSION["profiel"]=="1"){
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Account</div></a>';
                       }else{
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>'; 
                       }
                break;
            
            case 'informatie' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="menuGeselecteerd">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>';
                       if(isset($_SESSION["profiel"]) && $_SESSION["profiel"]=="1"){
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Account</div></a>';
                       }else{
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>'; 
                       }
                break;
                
            case 'webshop' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="menuGeselecteerd">Webshop</div></a>';
                       if(isset($_SESSION["profiel"]) && $_SESSION["profiel"]=="1"){
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Account</div></a>';
                       }else{
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>'; 
                       }
                break;
            
            case 'inloggen' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>';
                       if(isset($_SESSION["profiel"]) && $_SESSION["profiel"]=="1"){
                            $menu.='<ul>
                            			<li id="menuinloggen">
                            				<a href="?menuoptie=inloggen"><div >Account</div></a>
                            				<ul>
                            					<a href="?menuoptie=inloggen&loginoptie=bestellingen"><li>Bestellingen</li></a>
                            					<a href="?menuoptie=inloggen&loginoptie=account"><li>Accountgegevens</li></a>
                            					<form method="post" action="?menuoptie=inloggen">
   												<li><input type="submit" name="logoff" class="btnNoStyle" value="uitloggen">
   	  											</form></li>
                            				</ul>
                            			</li>
                            		</ul>';
                       }else{
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="menuGeselecteerd">Inloggen</div></a>'; 
                       }
                break;
                
            default :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="menuGeselecteerd">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>';
                       if(isset($_SESSION["profiel"]) && $_SESSION["profiel"]=="1"){
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Account</div></a>';
                       }else{
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>'; 
                       }
                       
                break;
        }
    }else{
       $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="menuGeselecteerd">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>';
                       if(isset($_SESSION["profiel"]) && $_SESSION["profiel"]=="1"){
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Account</div></a>';
                       }else{
                            $menu.='<a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>'; 
                       }
    }
    return $menu;
    
}
