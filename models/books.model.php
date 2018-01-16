<?php

    class BooksModel extends Model
    {
        public function getdata()
        {
            $this->prepare('SELECT idBook, Book_name, Balance, Location, Status, ISBN FROM book');
            $result = $this->fetchall();
            foreach($result as $row)
            {
                $badge = '';
                $this->prepare('SELECT category_name from book_category left join category on category_idCategory = idCategory where Book_idBook ='.$row['idBook']);
                $resultcategory = $this->fetchall();
                foreach($resultcategory as $data)
                {
                    $badge .= ' <span class="badge badge-info">'.$data['category_name'].'</span>';
                }

                if($row['Status']=='1')
                {
                    $btn = ' <button class="btn btn-outline-muted" ><i class="fa fa-ban fa-fw"></i></button>';
                    $status = '<label class="switch" id="Status" data-value= '.$row['Status'].' data-id='.$row['idBook'].'>Active<input type="checkbox"><span class="slider round"></span></label>';
                }
                else
                {
                    $btn = ' <button class="btn btn-outline-muted" role="button"><i class="fa fa-check fa-fw"></i></button>';
                    $status = '<label class="switch" id="Status" data-value= '.$row['Status'].' data-id='.$row['idBook'].'>InActive<input type="checkbox" checked><span class="slider round"></span></label>';
                }
                $dataresult["data"][] = array(
                    $row['Book_name'],
                    $row['ISBN'],
                    $badge,
                    $row['Balance'],
                    $status,
                    "<button class='btn' data-target='#book_view' data-toggle='modal' id='view' value=".$row['idBook']."><i class='fa fa-eye'></i></button>
                    <a class='btn btn-gray' href=".ROOT_PATH."books/update/".$row['idBook']." role='button'><i class='fa fa-edit'></i></a>"
                );
            }
            echo json_encode($dataresult);
        }

        public function add()
        {
            if(isset($_POST['submit']))
            {
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data_array = array(
                    array("Book_name", $post['Book_name']),
                    array("Published_date", $post['Published_date']),
                    array("Book_describe", $post['Describe']),
                    array("Book_pages", $post['Pages']),
                    array("Balance", $post['Balance']),
                    array("Location", $post['Location']),
                    array("Book_cover", 'no photo'),
                    array("ISBN", $post['ISBN']),
                );
                $this->insert("book",$data_array);
                if($idBook = $this->lastInsertId())
                {
                    foreach($post['Category'] as $key => $category)
                    {
                        $data = array(
                            array('book_idBook',$idBook),
                            array('category_idCategory', $category)
                        );
                        $this->insert("book_category", $data);
                    }
                    header('location: '.ROOT_URL.'books');
                    echo "success";
                    return;
                }
                else
                {
                        echo "error";
                }
            }
        }

        public function edit($id)
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data_array = array(
                array("Book_name", $post['Book_name']),
                array("Published_date", $post['Published_date']),
                array("Book_describe", $post['Describe']),
                array("Book_pages", $post['Pages']),
                array("Balance", $post['Balance']),
                array("Location", $post['Location']),
                array("Book_cover", 'no photo'),
                array("ISBN", $post['ISBN']),
            );
            $this->update('book', $data_array, 'idBook', $id);

            $this->destroy($id, 'book_category', 'book_idBook');

            foreach($post['Category'] as $key => $category)
            {
                $data = array(
                    array('book_idBook',$id),
                    array('category_idCategory', $category)
                );
                $this->insert("book_category", $data);
            }
            header('location: '.ROOT_URL.'books');
            echo "success";
            return;

            //destroy($id, $table, $where)
        }

        public function getoption($selected = false)
        {
            $this->prepare('SELECT idCategory,Category_name FROM category');
            $result = $this->fetchall();
            $option='';

            if(isset($selected))
            {
                foreach($result as $row)
                {
                    $opt_selected = '';
                    for($i = 0; $i < count($selected); $i++)
                    {
                        if($selected[$i] == $row['idCategory'])
                        {
                            $opt_selected .= 'selected';
                            break;
                        }
                        else
                        {
                            $opt_selected .= '';
                        }
                    }
                    $option .= '<option value = "'.$row['idCategory'].'"'.$opt_selected.'>'.$row['Category_name'].'</option>';
                }
                return $option;
            }
            else
            {
                foreach($result as $row)
                {
                    $option .= '<option value = '.$row['idCategory'].'>'.$row['Category_name'].'</option>';
                }
                return $option;
            }
        }

        public function updatestatus($id,$status)
        {
            if($status == 0)
            {
                $update = 1;
            }
            else
            {
                $update = 0;
            }
            $data_array = array(array('Status',$update));

            $this->update('book', $data_array, 'idBook', $id);
        }

        public function getdatabyid($id,$type)
        {
            $data = $this->getbyId('Book',$id,'idBook');
            $this->prepare('SELECT idCategory,category_name from book_category left join category on category_idCategory = idCategory where Book_idBook ='.$data['idBook']);
            $resultcategory = $this->fetchall();
            $badge = array();
            foreach($resultcategory as $row)
            {
                if($type == 'VIEW')
                {
                    array_push($badge,' <span class="badge badge-info">'.$row['category_name'].'</span>');
                }
                else if($type == 'UPDATE')
                {
                    array_push($badge,$row['idCategory']);
                }
            }
            $data['Category'] = $badge;

            if($type == 'VIEW')
            {
                echo json_encode($data);
            }
            else
            {
                return $data;
            }
        }

    }

?>
