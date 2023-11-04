<?php
include_once("View/view_loader.php");
include_once("Model/felhasznalok.php");

class Loginfeldolgozoc_Controller
{
    public $baseName= 'felhasznalok';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {

        $gepek= Felhasznalok::login($_POST["bejelentkezes"], $_POST["jelszo"]);
        //var_dump($gepek);
        //$testModel= new Test_Model;  //az osztályhoz tartozó modell
     
            //modellből lekérdezzük a kért adatot
           // $reqData= $testModel->get_data($vars['data']); 
            //betöltjük a nézetet
            
            //átadjuk a lekérdezett adatokat a nézetnek
           

            if(sizeof($gepek)==0)
            {           
                $view= new View_Loader('login_main');
                $view->assign('hibauzenet', "Nem sikerült bejelentkezni");
            }
            else
            {
                $view= new View_Loader('mainpageuser_main');
                $_SESSION["user"]=serialize($gepek[0]) ;
                $view->assign('teljesnev', $gepek[0]->csaladi_nev." ". $gepek[0]->utonev." ".$gepek[0]->bejelentkezes);

            }
        
    }
}
?>