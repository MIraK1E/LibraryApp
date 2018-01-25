<div class="card mt-5 mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-3 ml-3">
                <h2 class="text-dark"><i class="fa fa-book fa-fw"></i> Book</h2>
                <a href="<?= ROOT_URL ?>books/add" class="btn btn-outline-info mt-2"><b><i class="fa fa-plus fa-fw"></i> Add Book</b></a>
            </div>
        </div>
        <table class="table table-bordered dt-responsive text-center" id="book_table" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>Book Name</th>
                    <th>ISBN</th>
                    <th>Category</th>
                    <th>Avialable</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="book_view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-book fa-fw"></i> Book Info</h5>
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
                        <h3 id="Book_name"></h3>
                        <h5 id="ISBN"></h5>
                        <h6 id="Published_date"></h6>
                        <h6 id="book_pages"></h6>
                        <h5 id="Category"></h5>
                        <h6 class="mt-3"></h6>
                        <p id="Book_description">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
