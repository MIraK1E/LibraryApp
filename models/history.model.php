<?php

    class HistoryModel extends Model
    {
        public function getdata()
        {
            $this->prepare('SELECT idLoan,Loan_date,Mem_name FROM loan LEFT JOIN member ON member_idMember = idMember');
            $result = $this->fetchAll();
            foreach($result as $data)
            {
                $amount = $this->databook('count', $data['idLoan']);
                $dataresult["data"][] = array(
                    $data['idLoan'],
                    $data['Mem_name'],
                    $amount,
                    $data['Loan_date'],
                    "<button class='btn btn-mute' id='view' value='".$data['idLoan']."'><i class='fa fa-eye'></i></button>"
                );
            }
            echo json_encode($dataresult);
        }

        public function databook($returntype, $loan_id)
        {
            if($returntype == 'count')
            {
                $this->prepare('SELECT Book_amount_idBook_amount FROM loan_detail WHERE loan_idLoan ='.$loan_id);
                $return = $this->count();
            }
            else if($returntype == 'data')
            {
                $this->prepare('SELECT Book_amount_idBook_amount,book_name,Return_date,fine FROM loan_detail
                                LEFT JOIN book_amount ON idBook_amount =  Book_amount_idBook_amount
                                LEFT JOIN book ON idbook = book_idbook WHERE loan_idLoan ='.$loan_id);
                $return = $this->fetchAll();
            }
            return $return;
        }

        public function getborrowdata($id)
        {
            $this->prepare('SELECT idLoan,Loan_date,Mem_name FROM loan LEFT JOIN member ON member_idMember = idMember WHERE idLoan ='.$id);
            $result = $this->fetch();
            $response['headerdata'] = $result;
            $book = $this->databook('data', $result['idLoan']);
            $table ='';
            foreach($book as $data)
            {
                if($data['Return_date'] == '')
                {
                    $data['Return_date'] = '-';
                }
                $table.= "<tr><td>".$data['Book_amount_idBook_amount']."</td>
                        <td>".$data['book_name']."</td>
                        <td>".$data['Return_date']."</td>
                        <td>".$data['fine']."</td></tr>";
            }
            $response['tabledata'] = $table;
            echo json_encode($response);
        }
    }

?>
