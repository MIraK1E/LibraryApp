<?php

    class Books extends Controller
    {
        protected function index()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['getdata']))
                {
                    $viewmodel = new BooksModel;
                    $result = $viewmodel->getdata();
                }
                else if(isset($_POST['status']))
                {
                    $viewmodel = new BooksModel();
                    $viewmodel->updatestatus($_POST['idBook'],$_POST['status']);
                }
                else if(isset($_POST['get_individual_data']))
                {
                    $model = new BooksModel();
                    $model->getdatabyid($_POST['get_individual_data'],'VIEW');
                }
                else
                {
                    $this->renderView(false,true,$this->getClass());
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
                if(isset($_POST['get_opt']))
                {
                    $viewmodel = new BooksModel();
                    echo $viewmodel->getoption();
                }
                else
                {
                    $viewmodel = new BooksModel();
                    $this->renderView($viewmodel->add(),true,$this->getClass());
                }
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
                if(isset($_POST['submit']))
                {
                    $model = new BooksModel();
                    $model->edit($_GET['id']);
                }
                else
                {
                    if(isset($_POST['get_opt']))
                    {
                        $viewmodel = new BooksModel();
                        echo $viewmodel->getoption($_POST['selected']);
                    }
                    else
                    {
                        $viewmodel = new BooksModel();
                        $this->renderview($viewmodel->getdatabyid($_GET['id'],'UPDATE'),true,$this->getClass());
                    }
                }
            }
            else
            {
            header('Location:'.ROOT_URL);
            }
        }

        protected function bookamount()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['idBook']))
                {
                    if($_POST['action'] == 'add')
                    {
                        $viewmodel = new BooksModel;
                        $this->renderView($viewmodel->addamount($_POST['idBook']),false,$this->getClass());
                    }
                    else
                    {
                        $viewmodel = new BooksModel;
                        $this->renderView($viewmodel->deleteamount($_POST['code'],$_POST['idBook']),false,$this->getClass());
                    }
                }
                else
                {
                    $viewmodel = new BooksModel;
                    $this->renderView($viewmodel->amountindex($_GET['id']),true,$this->getClass());
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }
    }

?>
