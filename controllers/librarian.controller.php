<?php

    class librarian extends controller
    {
        protected function index()
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

        protected function add()
        {
            $viewmodel = new LibrarianModel;
            $this->renderView($viewmodel->add(),true);
        }

        protected function update()
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

        protected function inactive()
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
    }

?>
