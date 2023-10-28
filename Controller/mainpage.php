<?php
include_once("View/view_loader.php");

class MainPage_Controller
{
    public $baseName= 'mainpage';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {
        
        //Var_dump($gepek);
        //$testModel= new Test_Model;  //az osztályhoz tartozó modell
     
            //modellből lekérdezzük a kért adatot
           // $reqData= $testModel->get_data($vars['data']); 
            //betöltjük a nézetet
            $view= new View_Loader($this->baseName.'_main');
            //átadjuk a lekérdezett adatokat a nézetnek
            
            //$view->assign('content', $reqData['content']);
            
            
        
    }
}
?>