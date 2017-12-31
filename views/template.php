<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Library</title>
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>/assets/datatables/dataTables.bootstrap4.min.css">
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/popper.js/popper.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
        <?php
            if($js)
            {
                echo "<script type='text/javascript' src='".ROOT_PATH."javascript/".$js.".js'></script>";
            }
        ?>
    </head>
    <body class="bg-light">
        <div class="container-fulid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="<?= ROOT_PATH ?>" class="navbar-brand"><i class="fa fa-university fa-fw"></i> Library Demo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarlist" aria-controls="navbarlist" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarlist">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item mr-2">
                            <a href="<?= ROOT_URL ?>books" class="nav-link"><i class="fa fa-book fa-fw"></i> Book</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ROOT_URL ?>category" class="nav-link"><i class="fa fa-cubes fa-fw"></i> Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                        </li>
                    </ul>
                </div>
          </nav>
            <div class="container" id="partail_view">
                <?php require($view); ?>
            </div>
        </div>
    </body>
</html>
