<?php
include_once("View/view_loader.php");
include_once("Model/hirek.php");
class Hirekc_Controller
{
    public $baseName= 'hirek';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {
        $gepek= Hirek::getAll();
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
        
    }
}
?>