<?php

    class member extends controller
    {
        protected function index()
        {
            if(isset($_SESSION['is_login']))
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
                else if(isset($_POST['getviewdata']))
                {
                    $model = new MemberModel;
                    $result = $model->viewmemberdata($_POST['getviewdata']);
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
            else
            {
                header('Location:'.ROOT_URL);
            }
        }

        protected function viewhistory()
        {
            if(isset($_SESSION['is_login']))
            {
                if(isset($_POST['getdatahistory']))
                {
                    $model = new MemberModel;
                    $model->fullhistory($_GET['id']);
                }
                else
                {
                    $this->renderView(false,true);
                }
            }
            else
            {
                header('Location:'.ROOT_URL);
            }    
        }
    }

?>
