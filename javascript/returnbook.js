function declare_select2()
{
    $(".book_code").each(function(){
        $(this).select2();
    });
    $('.select2').css({'width':'100%'});
}

function add_book()
{
    $(document).on('click','#add_book',function(){
        $.post('returnbook/index',
        {
            get_book_code : true,
        },
        function(response)
        {
            $('#book_list')
            .append('<tr>'+
                        '<input type="hidden" name="idLoan_detail[]">'+
                        '<td class="text-center">'+
                            '<select name="book_code[]" class="book_code">'+response+'</select>'+
                        '</td>'+
                        '<td></td>'+
                        '<td></td>'+
                        '<td><input type="number" name="fine[]" class="form-control" readonly disable></td>'+
                        '<td>'+
                            '<button class="btn" id="del_book"><i class="fa fa-times fa-fw"></i></button>'+
                        '</td>'+
                    '</tr>');
            declare_select2();
        });
    });
}

function delete_book()
{
    $(document).on('click', '#del_book', function(){
        $(this).closest('tr').remove();
    });
}

function get_book_info()
{
    $(document).on('change','.book_code',function(){
        var bookname = $('option:selected',this).attr('data-name');
        var bookdate = $('option:selected',this).attr('data-date');
        var fine = $('option:selected',this).attr('data-fine');
        var idLoan = $('option:selected',this).attr('data-id');

        $(this).closest('td').next('td').html(bookname);
        $(this).closest('tr').find('input[type="hidden"]').val(idLoan);
        $(this).closest('td').next('td').next('td').html(bookdate);
        $(this).closest('tr').find('input[type=number]').val(fine);
    });
}

$(document).ready(function(){
    add_book();
    get_book_info();
    delete_book();
});
