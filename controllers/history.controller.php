<?php

    class History extends controller
    {
        protected function index()
        {
            if(isset($_POST['getdata']))
            {
                $model = new HistoryModel;
                $model->getdata();
            }
            else if(isset($_POST['idLoan']))
            {
                $model = new HistoryModel;
                $model->getborrowdata($_POST['idLoan']);
            }
            else
            {
                $viewmodel = new HistoryModel;
                $this->renderView(false,true,$this->getClass());
            }
        }
    }

?>
