function book_table()
{
    $('#book_table').DataTable(
        {
            responsive: true,
            ajax: {url:'books/index',type: "POST",data:({getdata:true})},
            language: { search: ""},
            autoWidth: false
        }
    );
    $('<label>Show:' +
        ' <select class="form-control form-control-sm select_extend">'+
        '<option value="Active" selected>Active</option>'+
        '<option value="InActive">InActive</option>'+
        '</select> status</label>').insertBefore(".dataTables_filter label");

    $(".dataTables_filter").addClass("row");
    $(".dataTables_filter label").addClass("col-lg-6 col-12 text-center");

    $('.dataTables_filter>label>input[type="search"]').wrap('<div class="input-group"></div>');
    $('<div class="input-group-prepend">'+
        '<span class="input-group-text">'+
                '<i class="fa fa-search fa-fw ml-2 mr-2"></i>'+
        '</span>').insertBefore('.dataTables_filter>label>.input-group>input[type="search"]');
    $('.dataTables_filter input').css({'margin-left':'0px','width':'1%'});
    $('.dataTables_filter .input-group-text').css('padding','.2rem');

}

function search()
{
    $.fn.dataTable.ext.search.push(
        function(setting, data, dataIndex){
            var search_status = $('.select_extend').val();
            var data_status = data[4];

            if(search_status == data_status)
            {
                return true;
            }
            return false;
        });
}

function search_by_status()
{
    var table = $("#book_table").DataTable();
    $('.select_extend').on( 'change', function () {
        table.draw();
    });
}

function update_member_status()
{
    $(document).on('click','#Status',function(){
        var idBook = $(this).attr('data-id');
        var status = $(this).attr('data-value');
        setTimeout(function(){
            $.post('books/index',
            {
                idBook : idBook,
                status : status
            },
            function()
            {
                $("#book_table").DataTable().ajax.reload();
            });
        },400);
    });
}

function view_book()
{
    $(document).on('click','#view',function(){
        $.post('books/index',
            {
                get_individual_data : $(this).val()
            },
            function(response)
            {
                var data = $.parseJSON(response);
                $('#Book_name').html(data.Book_name);
                $('#ISBN').html('ISBN : '+data.ISBN);
                $('#Published_date').html('Published date : '+data.Published_date);
                $('#book_pages').html('Pages : '+data.Book_pages);
                $('#Category').html(data.Category);
                $('#Book_description').html(data.Book_describe);
            });
    });
}

function amountaction(id,action,code)
{
    $.post('bookamount',
        {
            idBook : id,
            action : action,
            code : code
        },
        function(response)
        {
            $('#partail_view').html(response);
        });
}

function mask_input()
{
    $("input[name=ISBN]").mask("00-0000-000-0");
}

$(document).ready(function(){
    book_table();
    search();
    search_by_status();
    update_member_status();
    $('.select2').css({'width':'100%'});
    view_book();
    mask_input();
});
