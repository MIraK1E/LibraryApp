<div class="card mt-5 mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 ml-3 mb-3">
                <h2 class="text-dark"><i class="fa fa-users fa-fw"></i> Member</h2>
                <button type="button" id="add" data-toggle="modal" data-target="#member_form_modal" class="btn btn-outline-info mt-2"><b><i class="fa fa-plus fa-fw"></i> Add Member</b></button>
            </div>
        </div>
        <table class="table table-bordered dt-responsive text-center" id="member_table" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Member Name</th>
                    <th>Member Tel.</th>
                    <th>Member Email</th>
                    <th width="50px;">Status</th>
                    <th width="100px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="member_form_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-users fa-fw"></i> Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container mt-3 mb-4">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="member_form">
                    <input type="hidden" name="idMember" value="0">
                    <div class="form-row">
                        <div class="col-12 col-lg-4">
                            <input type="file">
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="form-group">
                                <label for="Mem_name">Name - Surname</label>
                                <input type="text" name="Mem_name" class="form-control">
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Mem_tel">Phone</label>
                                        <input type="text" name="Mem_tel" class="form-control Mem_tel" maxlength='14'>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Mem_email">Email</label>
                                        <input type="text" name="Mem_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-warning" id="btn-edit" type="submit"><i class="fa fa-edit fa-fw"></i> Update Member</button>
                            <button class="btn btn-outline-primary" id="btn-add" type="submit"><i class="fa fa-plus fa-fw"></i> Add Member</button>
                            <button class="btn btn-outline-danger" type="reset"><i class="fa fa-refresh fa-fw"></i> reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="member_view_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-users fa-fw"></i> Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <img style="width:100%;"src="<?= ROOT_URL?>assets/images/img_avatar.png">
                        <a class="btn btn-outline-info btn-block mt-2" href="#" target="blank" role="button" width="100%"><i class="fa fa-external-link fa-fw"></i> View History </a>
                    </div>
                    <div class="col-12 col-sm-8">
                        <h3 id="view_Mem_name"><i class="fa fa-address-card fa-fw"></i></h3>
                        <h5 id="view_Mem_email"><i class="fa fa-envelope fa-fw"></i></h5>
                        <h5 id="view_Mem_tel"><i class="fa fa-phone fa-fw"></i></h5>
                        <h6 class="mt-3"><i class="fa fa-exchange fa-fw"></i></h6>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Date</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>20/02/1994</td>
                                    <td><a class="btn btn-outline-info btn-block" href="#" target="blank" role="button"><i class="fa fa-eye fa-fw"></i> View</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>21/02/1994</td>
                                    <td><a class="btn btn-outline-info btn-block" href="#" target="blank" role="button"><i class="fa fa-eye fa-fw"></i> View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
