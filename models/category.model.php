<?php

    class CategoryModel extends Model
    {
        public function getdata()
        {
            $this->prepare('SELECT * FROM category');
            $result = $this->fetchAll();
            foreach($result as $row)
            {
                $this->prepare('SELECT count(category_idCategory) as Book FROM book_category where category_idCategory ='.$row['idCategory']);
                $count = $this->fetch();

                $dataresult["data"][] = array(
                    $row['idCategory'],
                    $row['Category_name'],
                    $count['Book'],
                    "<button class='btn btn-mute' id='edit' value=".$row['idCategory']."><i class='fa fa-edit'></i></button>
                    <button class='btn btn-mute' id='delete' value=".$row['idCategory']."><i class='fa fa-times'></i></button>"
                );
            }
            echo json_encode($dataresult);
        }

        public function add()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data_array = array(array('Category_name',$post['Category_name']));
            $this->insert("category",$data_array);

            $result = $this->getData();
            return $result;
        }

        public function getcategorydata($id)
        {
            $data = $this->getbyId('category',$id,'idCategory');
            echo json_encode($data);
        }

        public function edit($id)
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
