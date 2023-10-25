
<?php
class View_Loader
{
private $data = array();
private $render = FALSE;
public function __construct($viewName)
{
$file =  'View/' . strtolower($viewName) . '.php';
if (file_exists($file))
{ $this->render = $file; }        
}
public function assign($variable , $value)
{
$this->data[$variable] = $value;
}
public function __destruct()
{
$viewData = $this->data;
include($this->render);
}
}


?>
