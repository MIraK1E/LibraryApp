<?php

    class Home extends controller
    {
        public function index()
        {
            $viewmodel = new HomeModel();
            $this->renderView($viewmodel->index(),true);
        }
    }

?>
