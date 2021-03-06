<?php
    // core class for routes application
    class Route
    {
        // declare param for route by controller and method
        private $controller;
        private $request;
        private $action;
        private $id;

        public function __construct($request)
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
            //check action if !isset redirect to index
            if($request['action'] == '')
            {
                $this->action = 'index';
            }
            else
            {
                $this->action = $this->request['action'];
            }
            if($request['id'] == '')
            {
                $this->id = '';
            }
            else
            {
                $this->id = $this->request['id'];
            }
        }

        public function createController()
        {
            //check class
            if(class_exists($this->controller))
            {
                $parents = class_parents($this->controller);
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
                        echo '<h1 Method Not Found>';
                    }
                }
                else
                {
                    echo '<h1>BaseController Not Found</h1>';
                }
            }
            else
            {
                echo '<h1>Controller Not Found</h1>';
            }
        }
    }

?>
