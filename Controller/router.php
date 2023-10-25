<?php
if(isset($_GET["page"]))
{
    $target='Controller/'.$_GET["page"].'.php';
    if(file_exists($target))
    {
        include_once($target);
        $class= ucfirst($page).'_Controller';
        if(class_exists($class))
        { $controller= new $class; }
        else
        { die('classdoesnotexists!'); }
    }
    
}


else
{ die('pagedoesnotexist!'); }
$controller->main($vars);

function __autoload($className)
{
    $file='Model/'.strtolower($className).'.php';
    if(file_exists($file))
    { include_once($file); }
    else
    { die("File '$filename' containingclass'$className' notfound."); }
}


?>