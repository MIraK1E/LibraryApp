<?php

    class HomeModel extends BooksModel
    {
        public function search()
        {
            $this->prepare("SELECT idBook, Book_name, Location, Status, ISBN FROM book WHERE Book_name LIKE '%".$_POST['search']."%'");
            $result = $this->fetchall();

            $book = '';
            if($this->count() > 0)
            {
                foreach($result as $data)
                {
                    $this->prepare('SELECT book_idBook FROM book_amount WHERE book_idBook ='.$data['idBook'].' AND Book_status = 1');
                    $amount = $this->count();
                    $book .="<div class='card bg-light mb-2'>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-lg-4 col-12'>
                                </div>
                                <div class='col-lg-8 col-12'>
                                    <h5>".$data['Book_name']."</h5>
                                    <p>ISBN : ".$data['ISBN']."</p>
                                    <p>Location : ".$data['Location']."</p>
                                    <p>In Library : ".$amount."</p>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                echo $book;
            }
        }
    }
?>
