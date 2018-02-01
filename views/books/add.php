<div class="card  mt-5">
    <div class="card-body">
        <form class="form-row" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="add_book" enctype="multipart/form-data">
            <div class="col-12 col-lg-4">
                <input type="file" id="file2" name="Book_cover">
            </div>
            <div class="col-12 col-lg-8">
                <div class="form-group">
                    <label for="book_name">Book's Name</label>
                    <input type="text" name="Book_name" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Category">Category</label>
                            <select class="category_selector" name="Category[]" multiple="multiple">
                                <script type="text/javascript">
                                    $('.category_selector').select2()
                                    $.post('add',
                                    {
                                        get_opt : true
                                    },
                                    function(response)
                                    {
                                        $('.category_selector').html(response);
                                    });
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="Published_date">Published Date</label>
                            <input type="date" name="Published_date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Describe">Describe</label>
                    <textarea name="Describe" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Pages">Pages</label>
                            <input type="text" name="Pages"class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="Balance">Balance</label>
                            <input type="text" name="Balance"class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ISBN">ISBN</label>
                            <input type="text" name="ISBN"class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location">Location</label>
                    <input type="text" name="Location"class="form-control">
                </div>
                <button name="submit" value="submit" class="btn btn-outline-primary"><i class="fa fa-plus fa-fw"></i> Add Book</button>
            </div>
        </form>
    </div>
</div>
