<?php

function menu(){
    if(isset($_GET['menuoptie'])){
        switch($_GET['menuoptie']){
            case 'homepage' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="menuGeselecteerd">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>
                       <a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>
              ';
                break;
            
            case 'informatie' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="menuGeselecteerd">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>
                       <a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>
              ';
                break;
                
            case 'webshop' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="menuGeselecteerd">Webshop</div></a>
                       <a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>
              ';
                break;
            
            case 'inloggen' :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>
                       <a href="?menuoptie=inloggen"><div id="menuinloggen" class="menuGeselecteerd">Inloggen</div></a>
              ';
                break;
                
            default :
                $menu='<a href="?menuoptie=homepage"><div id="menuhomepage" class="menuGeselecteerd">Homepage</div></a>
                       <a href="?menuoptie=informatie"><div id="menuinformatie" class="">Informatie</div></a>
                       <a href="?menuoptie=webshop"><div id="menuwebshop" class="">Webshop</div></a>
                       <a href="?menuoptie=inloggen"><div id="menuinloggen" class="">Inloggen</div></a>
              ';
                break;
        }
    }
    return $menu;
    
}
