<?php
include_once("View/view_loader.php");
include_once("Model/felhasznalok.php");
include_once("Model/hirek.php");
;
class Hirekmodositasc_Controller
{
    public $baseName= 'login';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {
        
        $user=unserialize( $_SESSION["usernamew"]);
            $gepek= Hirek::modositaskiolvas($user->id);
            
        //var_dump($gepek);
        //$testModel= new Test_Model;  //az osztályhoz tartozó modell
     
            //modellből lekérdezzük a kért adatot
           // $reqData= $testModel->get_data($vars['data']); 
            //betöltjük a nézetet
           
            $view= new View_Loader('hirekmodositas_main');
            //átadjuk a lekérdezett adatokat a nézetnek
            $view->assign('szoveg', "tesztszöveg");
            //$view->assign('content', $reqData['content']);
            $view->assign('teljesnev', $user->csaladi_nev." ".$user->utonev." ".$user->bejelentkezes);
            $view->assign('gepek', $gepek);
           
        
    }
}
?>