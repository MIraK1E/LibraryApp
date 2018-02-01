<?php

    class MemberModel extends Model
    {
        public function getdata()
        {
            $this->prepare('SELECT * FROM member');
            $result = $this->fetchAll();
            foreach($result as $row)
            {
                if($row['Mem_status']=='1')
                {
                    $btn = ' <button class="btn btn-outline-muted" ><i class="fa fa-ban fa-fw"></i></button>';
                    $status = '<label class="switch" id="Status" data-value= '.$row['Mem_status'].' data-id='.$row['idMember'].'>Active<input type="checkbox"><span class="slider round"></span></label>';
                }
                else
                {
                    $btn = ' <button class="btn btn-outline-muted" role="button"><i class="fa fa-check fa-fw"></i></button>';
                    $status = '<label class="switch" id="Status" data-value= '.$row['Mem_status'].' data-id='.$row['idMember'].'>InActive<input type="checkbox" checked><span class="slider round"></span></label>';
                }
                $dataresult["data"][] = array(
                    $row['idMember'],
                    $row['Mem_name'],
                    $row['Mem_tel'],
                    $row['Mem_email'],
                    $status,
                    "<button class='btn btn-outline-muted' data-target='#member_view_modal' data-toggle='modal' id='view' value=".$row['idMember']."><i class='fa fa-eye'></i></button>
                    <button class='btn btn-outline-muted' data-target='#member_form_modal' data-toggle='modal' id='edit' value=".$row['idMember']."><i class='fa fa-edit'></i></button>"
                );
            }
            echo json_encode($dataresult);
        }

        public function getmemberdata($id)
        {
            $data = $this->getbyId('member', $id, 'idMember');

            echo json_encode($data);
        }

        public function viewmemberdata($id)
        {
            $data['member'] = $this->getbyId('member',$id,'idMember');
            $data['historytable'] = $this->getlastedborrow($id);
            $data['fine'] = $this->countfine($id);

            echo json_encode($data);
        }

        public function edit($id)
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data_array = array(
                array('Mem_name',$_POST['Mem_name']),
                array('Mem_tel',$_POST['Mem_tel']),
                array('Mem_email',$_POST['Mem_email'])
            );

            $this->update('member', $data_array, 'idMember', $id);
        }

        public function add()
        {
            $data_array = array(
                array('Mem_name',$_POST['Mem_name']),
                array('Mem_tel',$_POST['Mem_tel']),
                array('Mem_email',$_POST['Mem_email'])
            );
            $this->insert('member', $data_array);
            echo 'success';
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
            $data_array = array(array('Mem_status',$update));

            $this->update('member', $data_array, 'idMember', $id);
        }

        public function fullhistory($id)
        {
            if(is_numeric($id))
            {
                $this->prepare('SELECT idLoan,Loan_date FROM loan LEFT JOIN member ON member_idMember = idMember WHERE idMember ='.$id);
                $result = $this->fetchAll();
                $modelhistory = new HistoryModel;
                foreach($result as $data)
                {
                    $dataresult["data"][] = array(
                        $data['idLoan'],
                        $data['Loan_date'],
                        $modelhistory->databook('count', $data['idLoan']),
                        "<button class='btn btn-mute' id='view' value='".$data['idLoan']."'><i class='fa fa-eye'></i></button>"
                    );
                }
                if(!empty($dataresult))
                {
                    echo json_encode($dataresult);
                }
                else
                {
                    echo json_encode(array("data"=>array(array("nodata","nodata","nodata","nodata"))));
                }
            }
        }

        private function getlastedborrow($id)
        {
            $this->prepare('SELECT idLoan,Loan_date FROM loan WHERE member_idMember ='.$id.' ORDER BY idLoan DESC LIMIT 1');
            $result = $this->fetch();
            $historymodel = new HistoryModel;
            $book = $historymodel->databook('count', $result['idLoan']);

            $dataresult['idLoan'] = $result['idLoan'];
            $dataresult['Loan_date'] = $result['Loan_date'];
            $dataresult['book'] = $book;
            return $dataresult;
        }

        private function countfine($id)
        {
            $this->prepare('SELECT idLoan FROM loan WHERE member_idMember ='.$id);
            $result = $this->fetchAll();
            $amount = 0;
            foreach($result as $round)
            {
                $this->prepare('SELECT Fine From loan_detail where loan_idLoan ='.$round['idLoan'].' AND Fine_status = 2');
                $fine = $this->fetch();
                $amount += $fine['Fine'];
            }
            return $amount;
        }

        public function clearfine($id)
        {
            $this->prepare('SELECT idLoan FROM loan WHERE member_idMember ='.$id);
            $result = $this->fetchAll();
            foreach($result as $idLoan)
            {
                $data = array(array('Fine_status', 1));
                $this->update('loan_detail', $data, 'loan_idLoan', $idLoan['idLoan']);
            }

            return $this->countfine($id);

        }

    }

?>
