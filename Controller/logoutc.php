<?php
include_once("View/view_loader.php");
;
class Logoutc_Controller
{
    public $baseName= 'mainpage';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {
        
        //var_dump($gepek);
        //$testModel= new Test_Model;  //az osztályhoz tartozó modell
     
            //modellből lekérdezzük a kért adatot
           // $reqData= $testModel->get_data($vars['data']); 
            //betöltjük a nézetet
            session_unset();
            session_destroy();
            //$view= new View_Loader($this->baseName.'_main');
            header("Location: " . HOME_PAGE);
            //redirect('/' . HOME_PAGE, 'Sikeres kijelentkezés!', 'success');
            exit();
        
    }
}
?>