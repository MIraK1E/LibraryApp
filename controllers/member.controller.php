<?php

    class member extends controller
    {
        protected function index()
        {
            if(isset($_POST['getdata']))
            {
                $viewmodel = new MemberModel;
                $result = $viewmodel->getdata();
            }
            else if(isset($_POST['getindividualdata']))
            {
                $model = new MemberModel;
                $result = $model->getmemberdata($_POST['getindividualdata']);
            }
            else if(isset($_POST['Mem_name']))
            {
                if($_POST['idMember']=='0')
                {
                    $viewmodel = new MemberModel;
                    $result = $viewmodel->add();
                }
                else
                {
                    $viewmodel = new MemberModel;
                    $result = $viewmodel->edit($_POST['idMember']);
                }
            }
            else if(isset($_POST['clearfine']))
            {
                $model = new MemberModel;
                $result = $model->clearfine($_POST['idMember']);
            }
            else if(isset($_POST['idMember']))
            {
                $viewmodel = new MemberModel;
                $result = $viewmodel->updatestatus($_POST['idMember'], $_POST['status']);
            }
            else
            {
                $this->renderView(false,true,get_Class($this));
            }

        }

        protected function viewhistory()
        {
            if(isset($_POST['getdatahistory']))
            {
                $model = new MemberModel;
                $model->fullhistory($_GET['id']);
            }
            else
            {
                //$viewmodel = new MemberModel;
                $this->renderView(false,true);
            }
        }
    }

?>
