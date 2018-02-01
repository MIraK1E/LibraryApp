<?php

    class Messages
    {
        public static function setMsg($message, $type)
        {
            if($type == 'ERROR')
            {
                $_SESSION['errorMsg'] = $message;
            }
            else if($type == 'SUCCESS')
            {
                $_SESSION['successMsg'] = $message;
            }
        }
        public static function display()
        {
            if(isset($_SESSION['errorMsg']))
            {
                echo '<div class="alert alert-danger alert-dismissible fade show mt-5">'.$_SESSION['errorMsg'].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['errorMsg']);
            }
            else if(isset($_SESSION['successMsg']))
            {
                echo '<div class="alert alert-success alert-dismissible fade show mt-5">'.$_SESSION['successMsg'].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['successMsg']);
            }
        }

    }

?>
