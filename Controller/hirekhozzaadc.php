<?php
include_once("View/view_loader.php");
include_once("Model/felhasznalok.php");
include_once("Model/hirek.php");

class Hirekhozzaadc_Controller
{
    public $baseName= 'hirekhozzaad';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {
        
        //var_dump($gepek);
        //$testModel= new Test_Model;  //az osztályhoz tartozó modell
     
            //modellből lekérdezzük a kért adatot
           // $reqData= $testModel->get_data($vars['data']); 
            //betöltjük a nézetet
            $view= new View_Loader($this->baseName.'_main');
            $user=unserialize( $_SESSION["user"]);
            $view->assign('userid', $user->id);
           
        
    }
}
?>