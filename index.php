<?php
    require_once('http/router.php');
    require_once('base/controller.php');
    require_once('base/view.php');
    require_once('helpers/comic.php');
    require_once('controllers/home.php');

    use http\Router;
    
    $router = new Router();

    $router->handleRequest();
?>