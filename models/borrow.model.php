<?php

    class BorrowModel extends Model
    {

        public function getmemberdata()
        {
            $this->prepare('SELECT idMember, Mem_name, Mem_tel FROM member');
            $result = $this->fetchall();
            $option = '<option value="default">-- Search Member --</option>';
            foreach($result as $row)
            {
                $option .= '<option data-Mem_tel="'.$row['Mem_tel'].'" value="'.$row['idMember'].'">'.$row['Mem_name'].'</option>';
            }
            return $option;
        }

        public function getbookdata()
        {
            $this->prepare('SELECT idBook, Book_name FROM book WHERE Status = 1');
            $result = $this->fetchall();
            $option = '<option value="default">-- Search Book --</option>';
            foreach($result as $row)
            {
                $option .= '<option value="'.$row['idBook'].'">'.$row['Book_name'].'</option>';
            }
            return $option;
        }

        public function addborrow()
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data_array = array(
                array('Loan_date',$post['date']),
                array('librarian_idLibrarian',1),
                array('member_idMember',$post['member'])
            );
            $this->insert("loan",$data_array);
            if($idLoan = $this->lastInsertId())
            {
                foreach($post['book'] as $key => $idBook)
                {
                    $data = array(
                        array('loan_idLoan', $idLoan),
                        array('Book_idBook',$idBook),
                    );
                    $this->insert("loan_detail", $data);
                }
            }
        }

    }

?>
