<?php
    // core class for routes application
    class route
    {
        // declare param for route by controller and method
        private $controller;
        private $request;
        private $action;

        public function __construct($request,$action)
        {
            //get array['controller'=>'value','action'=>value] from index.php
            //set by .htaccess
            $this->request = $request;
            //check controller if !isset redirect to Home
            if($request['controller'] == '')
            {
                $this->controller = 'Home';
            }
            else
            {
                $this->controller = $this->request['controller'];
            }
            $this->action = $action;
            //check action if !isset redirect to index
            if($request['action'] == '')
            {
                $this->action = 'index';
            }
            else
            {
                $this->action = $this->request['action'];
            }
        }

        public function createController()
        {
            //check class
            if(class_exist($this->controller))
            {
                $parents = class_parent($this->controller);
                //check extend
                if(in_array("Controller", $parents))
                {
                    if(method_exists($this->controller, $this->action))
                    {
                        //create controller ex. new controller (request, action)
                        return new $this->controller($this->request, $this->action);
                    }
                    else
                    {
                        echo '<h1 Method Not Found>'
                    }
                }
                else
                {
                    echo '<h1>BaseController Not Found</h1>'
                }
            }
            else
            {
                echo '<h1>Controller Not Found</h1>';
            }
        }
    }

?>
