<?php
include_once('Controller/mainpage.php');
$controller;
if(isset($_GET["page"]))
{
    $target='Controller/'.$_GET["page"].'.php';
    if(file_exists($target))
    {
        include_once($target);
        $class= ucfirst($_GET["page"]).'_Controller';
        if(class_exists($class))
        { 
            $controller= new $class; 
            $controller->main();
        }
        else
        { 
            die('classdoesnotexists!'); 
        }
    }
    
}


else
{ 
    $mainpage = new MainPage_Controller();
    $mainpage->main();
    
    //die('pagedoesnotexist!'); 

}


/*function __autoload($className)
{
    $file='Model/'.strtolower($className).'.php';
    if(file_exists($file))
    { include_once($file); }
    else
    { die("File '$filename' containingclass'$className' notfound."); }
}*/


?>