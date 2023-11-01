<?php
include_once("View/view_loader.php");
include_once("Model/felhasznalok.php");

class Felhasznalokc_Controller
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
            $view= new View_Loader($this->baseName.'_main');
            //átadjuk a lekérdezett adatokat a nézetnek
            $view->assign('szoveg', "tesztszöveg");
            //$view->assign('content', $reqData['content']);
            
            $view->assign('gepek', $gepek);

            if(sizeof($gepek)==0)
            {
                
            }
        
    }
}
?>