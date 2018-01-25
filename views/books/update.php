<div class="card  mt-5">
    <div class="card-body">
        <form class="form-row" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="add_book">
            <div class="col-12 col-lg-4">
                <input type="file" id="file2">
            </div>
            <div class="col-12 col-lg-8">
                <div class="form-group">
                    <label for="book_name">Book's Name</label>
                    <input type="text" name="Book_name" class="form-control" value='<?= $viewmodel['Book_name'] ?>'>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Category">Category</label>
                            <select class="category_selector" name="Category[]" multiple="multiple">
                                <script>
                                    $('.category_selector').select2()
                                    $.post('update',
                                    {
                                        get_opt : true,
                                        selected : <?= json_encode($viewmodel['Category']); ?>
                                    },
                                    function(response)
                                    {
                                        console.log(response);
                                        $('.category_selector').html(response);
                                    });
                                    $('.category_selector').select2();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="Published_date">Published Date</label>
                            <input type="date" name="Published_date" class="form-control" value='<?= $viewmodel['Published_date'] ?>'>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Describe">Describe</label>
                    <textarea name="Describe" class="form-control" cols="30" rows="5"><?= $viewmodel['Book_describe'] ?></textarea>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Pages">Pages</label>
                            <input type="text" name="Pages"class="form-control" value='<?= $viewmodel['Book_pages'] ?>'>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ISBN">ISBN</label>
                            <input type="text" name="ISBN"class="form-control" value='<?= $viewmodel['ISBN'] ?>'>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location">Location</label>
                    <input type="text" name="Location"class="form-control" value='<?= $viewmodel['Location'] ?>'>
                </div>
                <button name="submit" value="submit" class="btn btn-outline-warning"><i class="fa fa-edit fa-fw"></i> Edit Book</button>
            </div>
        </form>
    </div>
</div>
