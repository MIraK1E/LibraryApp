<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Library</title>
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>/assets/css/style.css">
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/popper.js/popper.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <?php
            if($js)
            {
                echo "<script type='text/javascript' src='".ROOT_PATH."javascript/".$js.".js'></script>";
            }
        ?>
    </head>
    <body class="bg-light">
        <div class="container-fulid">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container">
                    <a href="<?= ROOT_PATH ?>" class="navbar-brand"><i class="fa fa-university fa-fw"></i> Library Demo</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= ROOT_URL ?>books" class="nav-link"><i class="fa fa-book fa-fw"></i> Book</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                        </li>
                    </ul>
                </div>
              <!-- Navbar content -->
            </nav>
            <div class="container">
                <?php require($view); ?>
            </div>
        </div>
    </body>
</html>
