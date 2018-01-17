var row = 1;
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
    $(document).on('click', '#add_book', function(){
        row +=1;
        $.post('borrow/index',
        {
            get_book_opt : true
        },
        function(response)
        {
            $('#book_list')
            .append('<tr>'+
                        '<td class="text-center">'+
                            '<select name="book[]" class="book">'+response+'</select>'+
                        '</td>'+
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
        row -=1;
        $(this).closest('tr').remove();
    });
}

function declare_select2()
{
    $(".book").select2();
    $('.select2').css({'width':'100%'});
}

$(document).ready(function(){
    show_data_member();
    add_book();
    delete_book();
    declare_select2();
});
