<div class="card mt-5 mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 ml-3 mb-3">
                <h2 class="text-dark"><i class="fa fa-list fa-fw"></i> History</h2>
            </div>
        </div>
        <table class="table table-bordered dt-responsive text-center" id="history_table" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Member Name</th>
                    <th>Amount</th>
                    <th>Borrow Date</th>
                    <th width="100px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="viewmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-list fa-fw"></i> History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <img style="width:100%;"src="<?= ROOT_URL?>assets/images/img_avatar.png">
                    </div>
                    <div class="col-lg-8 col-12">
                        <h3 id="mem_name"><i class="fa fa-address-card fa-fw"></i> 5555</h3>
                        <h5 id="borrow_date"><i class="fa fa-calendar fa-fw"></i> 5555</h5>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <td>Book code</td>
                                    <td>Book name</td>
                                    <td>Retrun date</td>
                                    <td>fine</td>
                                </tr>
                            </thead>
                            <tbody id="tabledata">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
