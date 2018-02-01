<?php

    class AuthenticateModel extends Model
    {
        public function login()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $this->prepare("SELECT idLibrarian, Lib_name FROM librarian WHERE Lib_email ='".$post['username']."'AND Password ='".$post['Password']."'AND Lib_status = 1");
            $data = $this->fetch();
            if($this->count() == 1)
            {
                $_SESSION['librarian']['name'] = $data['Lib_name'];
                $_SESSION['librarian']['id'] = $data['idLibrarian'];
                $_SESSION['is_login'] = true;
                header('location: '.ROOT_URL.'dashboard');
                return;
            }
            else
            {
                Messages::setMsg("Username or Password not Valid", "ERROR");
            }
        }

        public function checkAuth($id, $name)
        {
            $this->prepare("SELECT idLibrarian, Lib_name FROM librarian WHERE idLibrarian ='".$id."' AND Lib_name = '".$name."'");
            if($this->count() == 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function logout()
        {
            unset($_SESSION['library']);
            session_destroy();

            header('Location:'.ROOT_URL);
        }
    }

?>
