<?php

    abstract class Controller
    {
        protected $request;
        protected $action;

        public function __construct($request, $action)
        {
            $this->request = $request;
            $this->action = $action;
        }

        public function executeAction()
        {
            return $this->{$this->action}();
        }

        protected function getClass()
        {
            return get_class($this);
        }

        protected function renderView($viewmodel, $template, $js)
        {
            $view = 'views/'.get_class($this).'/'.$this->action.'.php';
            if($template)
            {
                require('views/template.php');
            }
            else
            {
                require($view);
            }
        }
    }

?>
