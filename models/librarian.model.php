<?php

    class LibrarianModel extends Model
    {
        public function index()
        {
            if(isset($_POST['idLibrarian']))
            {
                $data_array = array(array('Lib_status',0));

                $this->update("librarian", $data_array, 'idLibrarian', $_POST['idLibrarian']);
            }

            $this->prepare('SELECT idLibrarian, Lib_name, Lib_tel, Lib_email, Lib_status FROM librarian WHERE Lib_status = 1');
            $result = $this->fetchAll();
            return $result;
        }

        public function add()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_POST)
            {
                $data_array = array(
                    array("Lib_name",$post['Lib_name']),
                    array("Lib_tel",$post['Lib_tel']),
                    array("Lib_email",$post['Lib_email']),
                    array("Password",$post['Password']),
                    array("Lib_status",1)
                );

                $this->insert("librarian",$data_array);
                if($this->lastInsertId())
                {
                    header('location: '.ROOT_URL.'librarian');
                    echo "success";
                    return;
                }
            }
        }

        public function edit($id)
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_POST)
            {
                $data_array = array(
                    array("Lib_name",$post['Lib_name']),
                    array("Lib_tel",$post['Lib_tel']),
                    array("Lib_email",$post['Lib_email']),
                    array("Password",$post['Password']),
                    array("Lib_status",1)
                );

                $this->update("librarian", $data_array, 'idLibrarian', $id);

                header('location: '.ROOT_URL.'librarian');
                echo "success";
                return;
            }
        }

        public function getdatabyid($id)
        {
            $result = $this->getbyid('librarian', $id, 'idLibrarian');
            return $result;
        }

        public function inactive()
        {
            if(isset($_POST['idLibrarian']))
            {
                $data_array = array(array('Lib_status',1));
                $this->update("librarian", $data_array, 'idLibrarian', $_POST['idLibrarian']);
            }

            $this->prepare('SELECT idLibrarian, Lib_name, Lib_tel, Lib_email, Lib_status FROM librarian WHERE Lib_status = 0');
            $result = $this->fetchAll();
            return $result;
        }

    }

?>
