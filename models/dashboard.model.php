<?php

    class DashboardModel extends Model
    {
        public function dashboard()
        {
            $data['book'] = $this->countbook();
            $data['member'] = $this->countmember();
            $data['amount'] = $this->countfine();
            $data['debt'] = $this->countdebt();
            $data['categorygraph'] = $this->getcategorygraph();
            $data['transactiongraph'] = $this->gettransactiongraph();
            echo json_encode($data);
        }

        private function countbook()
        {
            $this->prepare('SELECT idBook_amount FROM book_amount');
            $result = $this->count();
            return $result;
        }

        private function countmember()
        {
            $this->prepare('SELECT idMember FROM member WHERE Mem_status = 1');
            $result = $this->count();
            return $result;
        }

        private function countfine()
        {
            $this->prepare('SELECT sum(Fine) AS amount FROM loan_detail');
            $result = $this->fetch();
            $data = $result['amount'];
            return $data;
        }

        private function countdebt()
        {
            $this->prepare('SELECT sum(Fine) AS debt FROM loan_detail WHERE Fine_status = 2');
            $result = $this->fetch();
            $data = $result['debt'];
            if($data == "")
            {
                $data = 0;
            }
            return $data;
        }

        private function getcategorygraph()
        {
            $this->prepare('SELECT idCategory,category_name FROM category');
            $result = $this->fetchAll();
            $dataresult = array();
            foreach($result as $data)
            {
                $this->prepare('SELECT count(category_idCategory) as Book FROM book_category where category_idCategory ='.$data['idCategory']);
                $count = $this->fetch();
                $row['value'] = $count['Book'];
                $row['label'] = $data['category_name'];
                array_push($dataresult, $row);
            }
            return $dataresult;
        }

        private function gettransactiongraph()
        {
            $dataresult = array();
            for($i = 0; $i <= 6; $i++)
            {
                if($i == 0)
                {
                    $day = date('Y-m-d');
                }
                else
                {
                    $day = date('Y-m-d', strtotime("-".$i." days"));
                }
                $this->prepare('SELECT count(idLoan) AS borrow FROM loan WHERE date(Loan_date) ="'.$day.'"');
                $result = $this->fetch();
                $row['date'] = $day;
                $row['value'] = $result['borrow'];
                array_push($dataresult, $row);
            }
            return $dataresult;
        }
    }

?>
