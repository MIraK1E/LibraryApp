<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Library</title>
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/datatables/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/datatables/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/pace/pace-theme-minimal.css">
        <link rel="stylesheet" href="<?= ROOT_PATH ?>assets/morris.js/morris.css">
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/popper.js/popper.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/datatables/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/datatables/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>assets/mask-input/jquery.mask.min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>/assets/select2/js/select2.full.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>/assets/morris.js/morris.min.js"></script>
        <script type="text/javascript">window.paceOptions = {target: '.loader'}</script>
        <script type="text/javascript" src="<?= ROOT_PATH ?>/assets/pace/pace.min.js"></script>
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>dashboard"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>borrow"><i class="fa fa-exchange fa-fw"></i> Borrow</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>returnbook"><i class="fa fa-reply fa-fw"></i> Return</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>history"><i class="fa fa-list fa-fw"></i>History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>member"><i class="fa fa-users fa-fw"></i> Members</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                <i class="fa fa-user fa-fw"></i> Librarians
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= ROOT_URL ?>librarian"><i class="fa fa-user fa-fw"></i> See Active</a>
                                <a class="dropdown-item" href="<?= ROOT_URL ?>librarian/add"><i class="fa fa-user-plus fa-fw"></i> New Librarian</a>
                                <a class="dropdown-item" href="<?= ROOT_URL ?>librarian/inactive"><i class="fa fa-user-times"></i> See InActive</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ROOT_URL ?>books" class="nav-link"><i class="fa fa-book fa-fw"></i> Books</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ROOT_URL ?>category" class="nav-link"><i class="fa fa-cubes fa-fw"></i> Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                        </li>
                    </ul>
                </div>
          </nav>
            <div class="loader"></div>
            <div class="container" id="partail_view">
                <?php require($view); ?>
            </div>
        </div>
    </body>
</html>
