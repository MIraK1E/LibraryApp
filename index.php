<?php

    require('config.php');

    require('core/controller.php');
    require('core/model.php');
    require('core/route.php');

    require('controllers/home.controller.php');
    require('controllers/books.controller.php');
    require('controllers/category.controller.php');

    require('models/books.model.php');
    require('models/home.model.php');
    require('models/category.model.php');

    $route = new Route($_GET);
    $controller = $route->createController();

    if($controller)
    {
        $controller->executeAction();
    }

?>
