<?php date_default_timezone_set("Asia/Bangkok"); ?>
<div class="card mt-5 mb-5">
    <div class="card-header">
        <h4><i class="fa fa-exchange fa-fw"></i> Borrow</h4>
        <h6>Librarian : -</h6>
    </div>
    <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <div class="col-lg-8 col-12">
                <h5 id="idMember">Member ID : -</h5>
                <h5 id="Member_name">Member name : -</h5>
                <h5 id="Mem_tel">Member tel. : -</h5>
            </div>
            <div class="col-lg-4 col-12">
                <div class="form-group">
                    <label for='member'>Select Member</label><br>
                    <select name="member" class="member">
                        <script>
                            $.post('borrow/index',
                            {
                                get_member_opt : true
                            },
                            function(response){
                                $('.member').html(response);
                            });
                            $('.member').select2();
                            $('.select2').css({'width':'100%'});
                        </script>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="datetime" name="date" class="form-control" value='<?php echo date('Y-m-d h:m'); ?>' readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h5><i class="fa fa-list fa-fw"></i>Borrow Book List</h5>
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
                                <th>Book Name</th>
                                <th width="200">Code</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody id="book_list">
                            <tr>
                                <td class="text-center">
                                    <select class="book">
                                        <script>
                                        $.post('borrow/index',
                                        {
                                            get_book_opt : true
                                        },
                                        function(response){
                                            $('.book').html(response);
                                        });
                                        </script>
                                    </select>
                                </td>
                                <td id="book_code">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-info btn-block"><i class="fa fa-exchange fa-fw"></i> Confirm Borrow</button>
            </div>
        </div>
        </form>
    </div>
</div>
