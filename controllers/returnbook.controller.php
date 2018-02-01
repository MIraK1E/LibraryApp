<?php

    class Returnbook extends Controller
    {

        protected function index()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['get_book_code']))
                {
                    $model = new ReturnbookModel;
                    echo $model->getBookcode();
                }
                else if(isset($_POST['submit']))
                {
                    $viewmodel = new ReturnbookModel;
                    $this->renderView($viewmodel->addReturn(),true,$this->getClass());
                }
                else
                {
                    $viewmodel = new ReturnbookModel;
                    $this->renderView($viewmodel->index(),true,$this->getClass());
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

    }

?>
