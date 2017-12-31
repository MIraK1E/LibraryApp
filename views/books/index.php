<div class="card  mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <a href="<?= ROOT_URL ?>books/add" class="btn btn-outline-info"><b><i class="fa fa-book fa-fw"></i> Add Book</b></a>
            </div>
            <div class="col-9">
                <div class="form-inline float-right">
                    <div class="form-group col-6">
                        <label class="mr-sm-2" for="book_status">status</label>
                        <select id="book_status_filter" class="form-control col-9">
                            <option value="1">Show Active Book</option>
                            <option value="2">Show Suspended Book</option>
                            <option value="3">Show All Book</option>
                        </select>
                    </div>
                    <div class="input-group col-6">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><label class="mr-sm-2" for="book_search">&nbsp;<i class="fa fa-search"></i></label></div>
                        </div>
                        <input type="text" name="book_search" class="form-control col-9">
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav mt-2">
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
                <?php if(empty($viewmodel)) { ?>
                <tr><td colspan="7">Book Not Found</td></tr>
                <?php }else{
                foreach($viewmodel as $book) : ?>
                    <tr>
                        <td><?= $book['idBook'] ?></td>
                        <td><?= $book['Book_name'] ?></td>
                        <td><?= $book['Category_name'] ?></td>
                        <td><?= $book['Balance'] ?></td>
                        <td><?= $book['Location'] ?></td>
                        <td><label class="switch"><input type="checkbox" data-status=<?= $book['Status'] ?> data-book=<?= $book['idBook'] ?> id="Status"<?php  if($book['Status']==2){echo 'checked';} ?>><span class="slider round"></span></label></td>
                        <td>
                            <button class="btn btn-outline-secondary" href="<?= ROOT_URL ?>books/view?id=<?= $book['idBook'] ?>"><i class="fa fa-search"></i></button>
                            <button class="btn btn-outline-warning" href="<?= ROOT_URL ?>books/edit?id=<?= $book['idBook'] ?>"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                <?php endforeach; }?>
            </tbody>
        </table>
    </div>
</div>
