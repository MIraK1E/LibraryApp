<?php

    class ReturnbookModel extends Model
    {

        public function index()
        {
            return;
        }

        public function getBookcode()
        {
            $this->prepare('SELECT idLoan_detail,idBook_amount,Book_name,Loan_date ,(datediff(now(), Loan_date)- hold) AS day FROM book_amount
                            JOIN book on idBook = book_idBook
                            JOIN loan_detail on Book_amount_idBook_amount = idBook_amount
                            JOIN loan on idLoan = loan_idLoan
                            WHERE Book_status = 0');
            $result = $this->fetchAll();
            $option = '<option value ="default">-- Book Code --</option>';
            foreach($result as $data)
            {
                if($data['day'] > 0 )
                {
                    $fine = $data['day']*5;
                }
                else {
                    $fine = 0;
                }
                $option .= "<option data-id='".$data['idLoan_detail']."' data-date='".$data['Loan_date']."' data-fine='".$fine."' data-name='".$data['Book_name']."' value='".$data['idBook_amount']."'>".$data['idBook_amount']."</option>";
            }
            return $option;
        }

        private function checkDuplicate($array)
        {
            $duplicate = array_count_values($array);
            $result;
            foreach($duplicate as $key => $value)
            {
                if($value == 1)
                {
                    $result = TRUE;
                }
                else
                {
                    $result = FALSE;
                    break;
                }
            }
            return $result;
        }

        public function addReturn()
        {
            $now = date('Y-m-d H:i:s');
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $pay_status = 0;

            if($this->checkDuplicate($post['book_code']))
            {
                if($post['submit'] == 'pay')
                {
                    $status = 1;
                }
                else if($post['submit'] == 'notpay')
                {
                    $status = 2;
                }
                for($i = 0; $i < count($post['book_code']); $i++)
                {
                    if($post['fine'][$i] == 0)
                    {
                        $pay_status = 0;
                    }
                    else
                    {
                        $pay_status = $status;
                    }

                    $data = array(
                        array('Return_date',$now),
                        array('Fine',$post['fine'][$i]),
                        array('Fine_status',$pay_status),
                    );
                    $this->update('loan_detail', $data, 'idLoan_detail', $post['idLoan_detail'][$i]);
                    $this->prepare('UPDATE book_amount SET Book_status = 1 WHERE idBook_amount = '.$post['book_code'][$i]);
                    $this->execute();
                }
            }
            else
            {
                echo 'don\'t try';
            }

        }

    }

?>
