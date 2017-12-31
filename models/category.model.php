<?php

    class CategoryModel extends Model
    {
        public function index()
        {
            $this->prepare('SELECT * FROM category');
            $result = $this->fetchAll();
            return $result;
        }

        public function add()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data_array = array(array('Category_name',$post['Category_name']));
            $this->insert("category",$data_array);

            $result = $this->getData();
            return $result;
        }

        public function getData()
        {
            $this->prepare('SELECT * FROM category');
            $result = $this->fetchAll();
            foreach($result as $row)
            {
                $dataresult["data"][] = array(
                    $row['idCategory'],
                    $row['Category_name'],
                    $row['Count'],
                    "<button class='btn btn-outline-warning' id='edit' value=".$row['idCategory']."><i class='fa fa-edit'></i></button>
                    <button class='btn btn-outline-danger' id='delete' value=".$row['idCategory']."><i class='fa fa-times'></i></button>"
                );
            }
            echo json_encode($dataresult);
        }

        public function getcategorydata($id)
        {
            $data = $this->getbyId('category',$id,'idCategory');
            echo json_encode($data);
        }

        public function edit($id,$name)
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data_array = array(array('Category_name',$post['Category_name']));

            $this->update('category', $data_array, 'idCategory', $id);
        }

        public function delete($id)
        {
            $result = $this->destroy($id,'category','idCategory');
            if($result =='success')
            {
                $response = array('status'=>'success','message'=>'success');
                echo json_encode($response);
            }
            else
            {
                $response = array('status'=>'error','message'=>'fail');
                echo json_encode($response);
            }
        }
    }

?>
