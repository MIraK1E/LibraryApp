<div class="card mt-5 mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-3 ml-3">
                <h2 class="text-dark"><i class="fa fa-book fa-fw"></i> Book amount</h2>
                <button onclick="amountaction(<?php if(empty($viewmodel['0']['book_idBook'])){ echo $_GET['id'].",'add',0"; }else{ echo $viewmodel['0']['book_idBook'].",'add',0"; } ?>)" class="btn btn-outline-info mt-2"><b><i class="fa fa-plus fa-fw"></i> Add Book</b></button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center" width="100%">
                <thead class="thead-light">
                    <tr>
                        <th>Code</th>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($viewmodel as $data) : ?>
                    <tr>
                        <td><?= $data['idBook_amount'] ?></td>
                        <td><?= $data['book_idBook'] ?></td>
                        <td><?= $data['Book_name'] ?></td>
                        <td><?php if($data['Book_status'] == 0){ echo"<span class='badge badge-danger'>Borrowed</span>"; }else{ echo"<span class='badge badge-info'>In Location</span>"; } ?></td>
                        <td><button class="btn btn-danger" onclick="amountaction(<?php $Code = $data['idBook_amount']; echo $data['book_idBook'].",'delete','$Code'"; ?>)"><i class="fa fa-times fa-fw"></i></button></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
