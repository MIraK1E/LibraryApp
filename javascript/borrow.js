function show_data_member()
{
    $(document).on('change', '.member', function(){
        if($(this).val() == 'default')
        {
            $('#idMember').html('Member ID : -');
            $('#Member_name').html('Member name : -');
            $('#Mem_tel').html('Member tel. : -');
        }
        else
        {
            $('#idMember').html('Member ID : '+$(this).val());
            $('#Member_name').html('Member name : '+$('option:selected', this).text());
            $('#Mem_tel').html('Member tel. : '+$('option:selected', this).attr('data-Mem_tel'));
        }
    });
}

function add_book()
{
    $(document).on('click','#add_book',function(){
        $.post('borrow/index',
        {
            get_book_opt : true,
        },
        function(response)
        {
            $('#book_list')
            .append('<tr>'+
                        '<td class="text-center">'+
                            '<select class="book">'+response+'</select>'+
                        '</td>'+
                        '<td></td>'+
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

function show_book_name()
{
    $(document).on('change','.book',function(){
        $(this).closest('td').next('td').html($('option:selected', this).attr('data-book_name'));
    });
}

function declare_select2()
{
    $(".book").each(function(){
        $(this).select2();
    });
    $('.select2').css({'width':'100%'});
}

function get_bookcode()
{
    $(document).on('change','.book',function(){
        var position = $(this).closest('td').next('td');
        $.post('borrow/index',
        {
            get_book_code : true,
            idBook : $(this).val()
        },
        function(response)
        {
            position.html(response);
        });
    });
}

$(document).ready(function(){
    show_data_member();
    delete_book();
    declare_select2();
    show_book_name();
    add_book();
    get_bookcode();
});
