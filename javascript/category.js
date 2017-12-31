function send_category_data()
{
    $("#category_form").submit(function(e)
    {
        e.preventDefault();
        var type = $("input[name=idCategory]").val();
        if(type == 0)
        {
            $.post('category/index',
            {
                Category_name : $("input[name=Category_name]").val()
            },
            function(response){
                $("#category_modal").modal('hide');
                $("#category_form")[0].reset();
                $("#category_table").DataTable().ajax.reload();
            });
        }
        else
        {
            $.post('category/index',
            {
                idCategory : $("input[name=idCategory]").val(),
                Category_name : $("input[name=Category_name]").val()
            },
            function(response){
                $("#category_modal").modal('hide');
                $("#category_form")[0].reset();
                $("#category_table").DataTable().ajax.reload();
            });
        }
    });
}

function edit_catagory()
{
    $(document).on("click","#edit",function(){
        $("#category_modal").modal("show");
        $.post('category/index',
        {
            Get_individual_data : $(this).val()
        },
        function(response){
            var data = $.parseJSON(response);
            $("input[name=Category_name]").val(data.Category_name);
            $("input[name=idCategory]").val(data.idCategory);
        });
    });
}

function delete_category()
{
    $(document).on("click","#delete",function(){
        //alert($(this).val());
        $.post('category/index',
        {
            idCategory : $(this).val()
        },
        function(response)
        {
            var data = $.parseJSON(response);
            alert(data.message);
            $("#category_table").DataTable().ajax.reload();
        });
    });
}

function category_table()
{
    $("#category_table").DataTable(
    {
        bLengthChange: false,
        searching: false,
        ajax : {url:'category/index',type: "POST",data:({Get_index_data:true})},
    });
}

function page_length()
{
    var table = $("#category_table").DataTable();
    $(document).on("change","#page_length",function(){
        table.page.len($(this).val()).draw();
    });
}

$(document).ready(function(){
    send_category_data();
    category_table();
    page_length();
    edit_catagory();
    delete_category();
});
