function history_table()
{
    $("#history_table").DataTable(
    {
        responsive: true,
        ajax: {url:'history/index',type: "POST",data:({getdata:true})},
    });
}

function viewmodal()
{
    $(document).on("click","#view",function(){
        $.post('history/index',
            {
                idLoan : $(this).val()
            },
            function(response)
            {
                var data = $.parseJSON(response);
                $("#mem_name").html('<i class="fa fa-address-card fa-fw"></i> '+data.headerdata.Mem_name);
                $("#borrow_date").html('<i class="fa fa-calendar fa-fw"></i> '+data.headerdata.Loan_date);
                $("#tabledata").html(data.tabledata);
                $("#viewmodal").modal();
            }
        );
    });
}

$(document).ready(function(){
    history_table();
    viewmodal();
});
