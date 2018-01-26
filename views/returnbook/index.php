<?php date_default_timezone_set("Asia/Bangkok"); ?>
<div class="card mt-5 mb-5">
    <div class="card-header">
        <h4><i class="fa fa-reply fa-fw"></i> Retrun</h4>
        <h6>Librarian : -</h6>
    </div>
    <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="form-group">
                        <label>Return Date</label>
                        <input type="datetime" name="date" class="form-control" value='<?php echo date('Y-m-d h:m'); ?>' readonly>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h5><i class="fa fa-list fa-fw"></i>Return Book List</h5>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="float-right  mb-2">
                                <a class="btn btn-gray" id="add_book"><i class="fa fa-plus fa-fw"></i> More Book</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-reponsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Book Name</th>
                                    <th>Borrow Date</th>
                                    <th width="100">Fine</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="book_list">
                                <tr>
                                    <input type="hidden" name="idLoan_detail[]">
                                    <td class="text-center">
                                        <select name="book_code[]" class="book_code">
                                            <script>
                                            $.post('returnbook/index',
                                                {
                                                    get_book_code : true
                                                },
                                                function(response)
                                                {
                                                    $('.book_code').html(response);
                                                });
                                                $('.book_code').select2();
                                                $('.select2').css({'width':'100%'});
                                            </script>
                                        </select>
                                    </td>
                                    <td id="book_name">
                                    </td>
                                    <td id="book_date">
                                    </td>
                                    <td>
                                        <input type="number" name="fine[]"  class="form-control"  readonly disable>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <button type="submit" name="submit" value="pay" class="btn btn-outline-info btn-block mt-2"><i class="fa fa-reply fa-fw"></i> Confirm Return & Pay Fine</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <button type="submit" name="submit" value="notpay" class="btn btn-outline-danger btn-block mt-2"><i class="fa fa-reply fa-fw"></i> Confirm Return & Not Pay Fine</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
