<?php
include_once('Controller/mainpage.php');
$controller;
if (isset($_GET["page"])) {

    $currentPage = $_GET["page"];
    $isLoggedIn = isset($_SESSION['user']);

    if (
        !$isLoggedIn &&
        !(str_contains($currentPage, 'login') || str_contains($currentPage, 'regiszt'))
    ) {
        //login nélkül nem érjük el az adatokat
        header("Location: index.php");
        exit();
    }

    $target = 'Controller/' . $currentPage . '.php';
    if (file_exists($target)) {
        include_once($target);
        $class = ucfirst($currentPage) . '_Controller';
        if (class_exists($class)) {
            $controller = new $class;
            $controller->main();
        } else {
            die('classdoesnotexists!');
        }
    }
} else {
    $mainpage = new MainPage_Controller();
    $mainpage->main();
}
