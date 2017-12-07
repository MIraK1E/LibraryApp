<?php

    require('config.php');

    require('core/controller.php');
    require('core/model.php');
    require('core/route.php');

    require('controllers/home.controller.php');

    require('models/home.model.php');

    $route = new Route($_GET);
    $controller = $route->createController();

    if($controller)
    {
        $controller->executeAction();
    }

?>