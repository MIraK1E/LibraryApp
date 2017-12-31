<?php

    class Books extends Controller
    {
        protected function index()
        {
            if(isset($_POST['status']))
            {

                if(isset($_POST['idBook']))
                {
                    $viewmodel = new BooksModel();
                    $this->renderView($viewmodel->updateindex($_POST['idBook'],$_POST['status'],$_POST['status_filter']),false,$this->getClass());
                }
                else
                {
                    $viewmodel = new BooksModel();
                    $this->renderView($viewmodel->fliter($_POST['status']),false,$this->getClass());
                }
            }
            else
            {
                $viewmodel = new BooksModel();
                $this->renderView($viewmodel->index(),true,$this->getClass());
            }

        }
        protected function add()
        {
            $viewmodel = new BooksModel();
            $this->renderView($viewmodel->add(),true,$this->getClass());
        }
        /*protected function update()
        {

        }*/
    }

?>
