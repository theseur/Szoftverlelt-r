<?php
include_once("View/view_loader.php");
include_once("Model/felhasznalok.php");

class Regisztraciofeldolgozoc_Controller
{
    public $baseName= 'felhasznalok';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {


       if($_POST["jelszo"]==$_POST["jelszo1"])
       {
        $csaladi_nev=$_POST["csaladi_nev"];
        $utonev=$_POST["utonev"];
        $bejelentkezes=$_POST["bejelentkezes"];
        $jelszo=$_POST["jelszo"];
        $gepek= Felhasznalok::regisztacio($csaladi_nev, $utonev, $bejelentkezes, $jelszo);
        $view= new View_Loader('login_main');
        $view->assign('hibauzenet', "Regisztráció sikeres");

       }
       else
       {
        $view= new View_Loader('regisztracio_main');
                $view->assign('hibauzenet', "Nem sikerült bejelentkezni");

       }
        
     
        
    }
}
?>