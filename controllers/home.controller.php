<?php

    class Home extends controller
    {
        protected function index()
        {
            $viewmodel = new HomeModel();
            $this->renderView($viewmodel->index(),true);
        }
    }

?>
