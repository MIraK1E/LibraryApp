function librarian_status()
{
    $(document).on("click","#status",function(){
        $.post(window.location.href,
        {
            idLibrarian : $(this).val()
        },
        function(response){
            $("#partail_view").html(response);
        });
    });
}

$(document).ready(function(){
    librarian_status();
});
