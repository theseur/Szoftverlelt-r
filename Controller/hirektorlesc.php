<?php
include_once("View/view_loader.php");
include_once("Model/hirek.php");
include_once("Model/felhasznalok.php");
class Hirektorlesc_Controller
{
    public $baseName= 'hirekuser';  //meghatározni, hogy melyik oldalon vagyunk

    public function main() // a routeráltal továbbított paramétereket kapja
    {

        
        $user=unserialize( $_SESSION["user"]);
            $torles=Hirek::torles($_GET["id"],  $user->id);
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