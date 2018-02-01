<?php

    class Authenticate extends controller
    {
        protected function index()
        {
            if(isset($_POST['submit']))
            {
                $auth = new AuthenticateModel;
                ;$this->renderview($auth->login(),true);
            }
            else
            {
                $auth = new AuthenticateModel;
                $this->renderview(false,true);
            }
        }

        protected function logout()
        {
            $auth = new AuthenticateModel;
            $auth->logout();
        }
    }

?>
