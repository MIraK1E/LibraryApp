<?php

    class BorrowModel extends Model
    {

        public function getmemberdata()
        {
            $this->prepare('SELECT idMember, Mem_name, Mem_tel FROM member WHERE Mem_status = 1');
            $result = $this->fetchall();
            $option = '<option value="default">-- Search Member --</option>';
            foreach($result as $row)
            {
                $option .= '<option data-Mem_tel="'.$row['Mem_tel'].'" value="'.$row['idMember'].'">'.$row['Mem_name'].'</option>';
            }
            return $option;
        }

        public function getbookcode()
        {
            $this->prepare('SELECT idBook_amount,Book_name FROM book_amount LEFT JOIN book ON idbook = book_idBook WHERE Book_status = 1 and idBook ='.$_POST['idBook']);
            $result = $this->fetchall();
            $option = '<select name="book_code[]" class="form-control"><option value="default">-- Book Code --</option>';
            foreach($result as $row)
            {
                $option .= '<option value="'.$row['idBook_amount'].'">'.$row['idBook_amount'].'</option>';
            }
            $option .= "</select>";
            return $option;
        }

        public function getbookdata()
        {
            $this->prepare('SELECT idBook,Book_name FROM book WHERE status = 1');
            $result = $this->fetchall();
            $option = '<option value="default">-- Book name --</option>';
            foreach($result as $row)
            {
                $option .= '<option value="'.$row['idBook'].'">'.$row['Book_name'].'</option>';
            }
            return $option;
        }

        public function addborrow()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            print_r($post);

            $data_array = array(
                array('Loan_date',$post['date']),
                array('librarian_idLibrarian',1),
                array('member_idMember',$post['member'])
            );
            $this->insert("loan",$data_array);
            if($idLoan = $this->lastInsertId())
            {
                foreach($post['book_code'] as $key => $Bookcode)
                {
                    $data = array(
                        array('loan_idLoan', $idLoan),
                        array('Book_amount_idBook_amount',$Bookcode),
                    );
                    $this->insert("loan_detail", $data);

                    $this->prepare('update book_amount set Book_status = 0 where idBook_amount ='.$Bookcode);
                    $this->execute();

                }
                echo '555';
            }
            else
            {
                echo 'fuck';
            }
        }

    }

?>
