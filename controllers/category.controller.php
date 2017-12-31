<?php

    class Category extends Controller
    {
        protected function index()
        {
            if(isset($_POST['Get_index_data']))
            {
                $model = new CategoryModel;
                $result = $model->getData();
            }
            else if(isset($_POST['Get_individual_data']))
            {
                $model = new CategoryModel;
                $result = $model->getcategorydata($_POST['Get_individual_data']);
            }
            else if(isset($_POST['Category_name']))
            {
                if(isset($_POST['idCategory']))
                {
                    $model = new CategoryModel;
                    $result = $model->edit($_POST['idCategory'],$_POST['Category_name']);
                }
                else
                {
                    $model = new CategoryModel;
                    $result = $model->add($_POST['Category_name']);
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
                $this->renderView($viewmodel->index(),true,$this->getClass());
                //$viewmodel->index();
            }
        }
    }

?>
