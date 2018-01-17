<?php

    require('config.php');

    require('core/controller.php');
    require('core/model.php');
    require('core/route.php');

    require('controllers/home.controller.php');
    require('controllers/books.controller.php');
    require('controllers/category.controller.php');
    require('controllers/librarian.controller.php');
    require('controllers/member.controller.php');
    require('controllers/borrow.controller.php');

    require('models/books.model.php');
    require('models/home.model.php');
    require('models/category.model.php');
    require('models/librarian.model.php');
    require('models/member.model.php');
    require('models/borrow.model.php');

    $route = new Route($_GET);
    $controller = $route->createController();

    if($controller)
    {
        $controller->executeAction();
    }

?>
