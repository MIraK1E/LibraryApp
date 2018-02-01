<?php
    date_default_timezone_set("Asia/Bangkok");
    session_start();

    require('config.php');

    require('core/upload.php');
    require('core/messages.php');
    require('core/controller.php');
    require('core/model.php');
    require('core/route.php');

    require('controllers/home.controller.php');
    require('controllers/books.controller.php');
    require('controllers/category.controller.php');
    require('controllers/librarian.controller.php');
    require('controllers/member.controller.php');
    require('controllers/borrow.controller.php');
    require('controllers/returnbook.controller.php');
    require('controllers/history.controller.php');
    require('controllers/dashboard.controller.php');
    require('controllers/authenticate.controller.php');

    require('models/books.model.php');
    require('models/home.model.php');
    require('models/category.model.php');
    require('models/librarian.model.php');
    require('models/member.model.php');
    require('models/borrow.model.php');
    require('models/returnbook.model.php');
    require('models/history.model.php');
    require('models/dashboard.model.php');
    require('models/authenticate.model.php');

    $route = new Route($_GET);
    $controller = $route->createController();

    if($controller)
    {
        $controller->executeAction();
    }

?>
