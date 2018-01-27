<?php

    class HistoryModel extends Model
    {
        public function getdata()
        {
            $this->prepare('SELECT idLoan,Loan_date,librarian_idLibrarian,Mem_name FROM loan LEFT JOIN member ON member_idMember = idMember');
            $result = $this->fetchAll();
            foreach($result as $data)
            {
                $amount = $this->databook('count', $data['idLoan']);
                $dataresult["data"][] = array(
                    $data['idLoan'],
                    $data['Mem_name'],
                    $amount,
                    $data['Loan_date'],
                    "<button class='btn btn-mute' id='edit'><i class='fa fa-edit'></i></button>
                    <button class='btn btn-mute' id='delete'><i class='fa fa-times'></i></button>"
                );
            }
            echo json_encode($dataresult);
        }

        private function databook($returntype, $loan_id)
        {
            $this->prepare('SELECT Book_amount_idBook_amount FROM loan_detail where loan_idLoan ='.$loan_id);
            if($returntype == 'count')
            {
                $return = $this->count();
            }
            else if($returntype == 'getdata')
            {
                $return = $this->fetchAll();
            }
            return $return;
        }
    }

?>
