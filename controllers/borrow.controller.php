<?php

    class Borrow extends Controller
    {

        protected function index()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['get_member_opt']))
                {
                    $model = new BorrowModel;
                    echo $model->getmemberdata();
                }
                else if(isset($_POST['get_book_opt']))
                {
                    $model = new BorrowModel;
                    echo $model->getbookdata();
                }
                else if(isset($_POST['get_book_code']))
                {
                    $model = new BorrowModel;
                    echo $model->getbookcode();
                }
                else if(isset($_POST['submit']))
                {
                    $viewmodel = new BorrowModel;
                    $this->renderView($viewmodel->addborrow(),true,$this->getClass());
                }
                else
                {
                    $viewmodel = new BorrowModel;
                    $this->renderView(false,true,$this->getClass());//$this->getClass()
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

    }

?>
