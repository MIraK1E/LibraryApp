<?php

    class BooksModel extends Model
    {
        public function index()
        {
            $this->prepare('SELECT idBook, Book_name, Category_name, Balance, Location, Status
                            FROM book
                            left join category
                            on Category_idCategory = idCategory WHERE Status = 1 ORDER BY idBook DESC');
            $result = $this->fetchall();
            return $result;
        }
        public function add()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_POST)
            {
                $data_array = array(
                    array("Book_name",$post['Book_name']),
                    array("Category_idCategory",$post['Category']),
                    array("Published_date",$post['Published_date']),
                    array("Book_describe",$post['Describe']),
                    array("Book_pages",$post['Pages']),
                    array("Balance",$post['Balance']),
                    array("Book_cover",'no photo'),
                );

                $this->Insert("book",$data_array);
                if($this->lastInsertId())
                {
                    header('location: '.ROOT_URL.'books');
                    echo "success";
                    return;
                }
            }
        }
        public function update()
        {

        }
        public function fliter($status)
        {
            if($status == 0)
            {
                $this->prepare('SELECT idBook, Book_name, Category_name, Balance, Location, Status
                                FROM book
                                left join category
                                on Category_idCategory = idCategory ORDER BY idBook DESC');
            }
            else
            {
                $this->prepare('SELECT idBook, Book_name, Category_name, Balance, Location, Status
                                FROM book
                                left join category
                                on Category_idCategory = idCategory WHERE Status = '.$status.' ORDER BY idBook DESC');
            }
            $result = $this->fetchall();
            return $result;
        }
    }

?>
