<?php

    class Returnbook extends Controller
    {

        protected function index()
        {
            if(isset($_POST['get_book_code']))
            {
                $model = new ReturnbookModel;
                echo $model->getBookcode();
            }
            else if(isset($_POST['submit']))
            {
                $model = new ReturnbookModel;
                $model->addReturn();
            }
            else
            {
                $viewmodel = new ReturnbookModel;
                $this->renderView($viewmodel->index(),true,$this->getClass());
            }
        }

    }

?>
