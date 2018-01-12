<?php

    class Category extends Controller
    {
        protected function index()
        {
            if(isset($_POST['getdata']))
            {
                $model = new CategoryModel;
                $result = $model->getdata();
            }
            else if(isset($_POST['getindividualdata']))
            {
                $model = new CategoryModel;
                $result = $model->getcategorydata($_POST['getindividualdata']);
            }
            else if(isset($_POST['Category_name']))
            {
                if($_POST['idCategory'] == '0')
                {
                    $model = new CategoryModel;
                    $result = $model->add();
                }
                else
                {
                    $model = new CategoryModel;
                    $result = $model->edit($_POST['idCategory']);
                }
            }
            else if(isset($_POST['idCategory']))
            {
                $model = new CategoryModel;
                $result = $model->delete($_POST['idCategory']);
            }
            else
            {
                $viewmodel = new CategoryModel;
                $this->renderView(false,true,$this->getClass());
            }
        }
    }

?>
