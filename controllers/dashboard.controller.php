<?php

    class Dashboard extends Controller
    {
        protected function index()
        {
            if(isset($_POST['dashboard']))
            {
                $model = new DashboardModel;
                $model->dashboard();
            }
            else
            {
                $this->renderView(false,true,$this->getClass());
            }
        }
    }

?>
