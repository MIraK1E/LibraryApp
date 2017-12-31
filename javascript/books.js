function book_status_filter()
{
    $(document).on('change','#book_status_filter',function(){
        var status = $("#book_status_filter").val();
        $.post(
            'books/index',
            {status:status},
            function(response){
                $("#partail_view").html(response);
                $('#book_status_filter').prop('selectedIndex',status-1);
            }
        );
    });
}

function change_book_status()
{
    $(document).on('click','#Status',function(){
        var status_filter = $("#book_status_filter").val();
        var idBook = $(this).attr('data-book');
        var status = $(this).attr('data-status');
        setTimeout(function(){
            $.post(
                'books/index',
                {idBook:idBook,status:status,status_filter:status_filter},
                function(response){
                    $("#partail_view").html(response);
                    $('#book_status_filter').prop('selectedIndex',status_filter-1);
            });
        },400);
    });
}

$(document).ready(function(){
    book_status_filter();
    change_book_status();
});
