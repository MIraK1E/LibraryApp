<?php

    class Borrow extends Controller
    {

        protected function index()
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
                $model = new BorrowModel;
                $model->addborrow();
            }
            else
            {
                $viewmodel = new BorrowModel;
                $this->renderView(false,true,$this->getClass());//$this->getClass()
            }
        }

    }

?>
