<?php

    class librarian extends controller
    {
        protected function index()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['idLibrarian']))
                {
                    $viewmodel = new LibrarianModel;
                    $this->renderView($viewmodel->index(),false,$this->getClass());
                }
                else
                {
                    $viewmodel = new LibrarianModel;
                    $this->renderView($viewmodel->index(),true,$this->getClass());
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

        protected function add()
        {
            if(isset($_SESSION['is_login']))
            {
                $viewmodel = new LibrarianModel;
                $this->renderView($viewmodel->add(),true);
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

        protected function update()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['Lib_name']))
                {
                    $viewmodel = new LibrarianModel;
                    $viewmodel->edit($_GET['id']);
                }
                else
                {
                    $viewmodel = new LibrarianModel;
                    $this->renderView($viewmodel->getdatabyid($_GET['id']),true);
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

        protected function inactive()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['idLibrarian']))
                {
                    $viewmodel = new LibrarianModel;
                    $this->renderView($viewmodel->inactive(),false,$this->getClass());
                }
                else
                {
                    $viewmodel = new LibrarianModel;
                    $this->renderView($viewmodel->inactive(),true,$this->getClass());
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }
    }

?>
