<?php

    class Borrowhistory extends Controller
    {

        protected function index()
        {
            if(isset($_SESSION['is_login']))
            {
                return;
            }
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

    }

?>
