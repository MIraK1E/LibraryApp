<?php

    class Books extends Controller
    {
        protected function index()
        {
            if(isset($_POST['status']))
            {
                $viewmodel = new BooksModel();
                echo json_encode($viewmodel->fliter($_POST['status']));

            }
            else
            {
                $viewmodel = new BooksModel();
                $this->renderView($viewmodel->index(),true,get_class($this));
            }

        }
        protected function add()
        {
            $viewmodel = new BooksModel();
            $this->renderView($viewmodel->add(),true,get_class($this));
        }
        /*protected function update()
        {

        }*/
    }

?>
