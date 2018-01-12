<div class="card mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 ml-3 mb-3">
                <h2 class="text-dark"><i class="fa fa-cubes fa-fw"></i> Category</h2>
                <button type="button" data-toggle="modal" data-target="#category_modal" class="btn btn-outline-info mt-2"><b><i class="fa fa-plus fa-fw"></i> Add Category</b></button>
            </div>
        </div>
        <table class="table table-bordered text-center mt-5" id="category_table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Book</th>
                    <th width="100px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-cubes fa-fw"></i> Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="category_form">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="idCategory" value="0">
                    <div class="form-group">
                        <label for="Category_name">Category Name</label>
                        <input type="text" class="form-control" name="Category_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-info"><i class="fa fa-plus fa-fw"></i>Add</button>
                    <button type="reset" data-dismiss="modal" aria-label="Close" class="btn btn-outline-danger"><i class="fa fa-times fa-fw"></i>Cancle</button>
                </div>
            </form>
        </div>
    </div>
</div>
