<div class="card  mt-5">
    <div class="card-body">
        <form class="form-row" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="add_librarian">
            <div class="col-4">
                <input type="file">
            </div>
            <div class="col-8">
                <!--<div class="form-group">
                </div>-->
                <div class="form-group">
                    <label for="book_name">Name - Surname</label>
                    <input type="text" name="Lib_name" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Category">Phone</label>
                            <input type="text" name="Lib_tel" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="Published_date">Email</label>
                            <input type="text" name="Lib_email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="Password" name="Password" class="form-control">
                </div>
                <button class="btn btn-outline-primary" value="submit"><i class="fa fa-plus fa-fw"></i> Add Librarian</button>
            </div>
        </form>
    </div>
</div>
