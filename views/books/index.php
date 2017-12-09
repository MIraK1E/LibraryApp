<div class="container">
    <div class="card  mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <a href="<?= ROOT_URL ?>books/add" class="btn btn-outline-info"><b><i class="fa fa-book fa-fw"></i> Add Book</b></a>
                </div>
                <div class="col-10">
                    <div class="form-inline float-right">
                        <div class="form-group">
                            <label class="mr-sm-2" for="book_status">Status</label>
                            <select id="book_status_filter" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                                <option value="1">Show Active Book</option>
                                <option value="2">Show Suspended Book</option>
                                <option value="0">Show All Book</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2" for="book_search">search</label>
                            <input type="text" name="book_search" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav mt-3">
                <li class="mr-3"><a class="text-dark">Active : 16</a></li>
                <li><a class="text-dark">Suspend : 16</a></li>
            </ul>
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Avialable</th>
                        <th>location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="book_table">
                    <?php foreach($viewmodel as $book) : ?>
                        <tr>
                            <td><?= $book['idBook'] ?></td>
                            <td><?= $book['Book_name'] ?></td>
                            <td><?= $book['Category_name'] ?></td>
                            <td><?= $book['Balance'] ?></td>
                            <td><?= $book['Location'] ?></td>
                            <td><label class="switch"><input type="checkbox" <?php  if($book['Status']==0){echo 'checked';} ?>><span class="slider round"></span></label></td>
                            <td>
                                <a class="btn btn-outline-secondary" href="<?= ROOT_URL ?>book/view?id=<?= $book['idBook'] ?>"><i class="fa fa-search"></i></a>
                                <a class="btn btn-outline-warning" href="<?= ROOT_URL ?>book/edit?id=<?= $book['idBook'] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
