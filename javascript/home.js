$(document).ready(function(){
    $("#search_box").keyup(function(){
        var text = $(this).val();
        if(text != '')
        {
            $.post('home/index',
                {
                    search : text
                },
                function(response)
                {
                    $("#space").html(response);
                }
            );
        }
        else {
            $("#space").html('');
        }
    });
});
