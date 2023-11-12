<?php
include_once("View/view_loader.php");
include_once("Model/felhasznalok.php");

class Mainpageuserc_Controller
{
    public $baseName= 'felhasznalok';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {
        if(isset($_SESSION["user"]))
        {
            
            $view= new View_Loader('mainpageuser_main');
          //  $user=unserialize( $_SESSION["user"]);
          //  $view->assign('teljesnev', $user->csaladi_nev." ".$user->utonev." ".$user->bejelentkezes);


        }

        
            
        
    }
}
?>