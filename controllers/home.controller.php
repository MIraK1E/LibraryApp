<?php

    class Home extends controller
    {
        protected function index()
        {
            if(isset($_POST['search']))
            {
                $model = new HomeModel;
                $model->search();
            }
            else
            {
                $viewmodel = new HomeModel();
                $this->renderView(false,true,$this->getClass());
            }
        }
    }

?>
