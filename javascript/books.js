function book_status_filter()
{
    $("#book_status_filter").change(function(){
        $.post(
            'books/index',
            {status:$("#book_status_filter").val()},
            function(response){
                var data = $.parseJSON(response);
                render_table(data);
            }
        );
    });
}
function render_table(data)
{
    var table;
    var status;
    $.each(data,function(i,item)
    {
        if(data[i].Status == 2)
        {
            status = 'checked';
        }
        else
        {
            status = '';
        }
        table += '<tr>'+
                    '<td>'+data[i].idBook+'</td>'+
                    '<td>'+data[i].Book_name+'</td>'+
                    '<td>'+data[i].Category_name+'</td>'+
                    '<td>'+data[i].Balance+'</td>'+
                    '<td>'+data[i].Location+'</td>'+
                    '<td><label class="switch"><input type="checkbox"'+status+'><span class="slider round"></span></label></td>'+
                    '<td><a class="btn btn-outline-secondary" href="<?= ROOT_URL ?>book/view?id=<?= $book['+data[i].idBook+'] ?>"'+'><i class="fa fa-search"></i></a> '+
                    '<a class="btn btn-outline-warning" href="<?= ROOT_URL ?>book/edit?id=<?= $book['+data[i].idBook+'] ?>"'+'><i class="fa fa-edit"></i></a></td>'+
                '<tr>'
    });
    $("#book_table").html(table);
}
$(document).ready(function(){
    book_status_filter();
});
