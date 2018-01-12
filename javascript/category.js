function send_category_data()
{
    $(document).on("submit","#category_form",function(e)
    {
        e.preventDefault();
        $.post('category/index',
        {
            Category_name : $("input[name=Category_name]").val(),
            idCategory : $("input[name=idCategory]").val()
        },
        function(){
            $('#category_form')[0].reset();
            $("input[type=hidden]").val('0');
            $("#category_modal").modal('hide');
            $("#category_table").DataTable().ajax.reload();
        });
    });
}

function edit_catagory()
{
    $(document).on("click","#edit",function(){
        $("#category_modal").modal("show");
        $.post('category/index',
        {
            getindividualdata : $(this).val()
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
        ajax : {url:'category/index',type: "POST",data:({getdata:true})},
    });
}


function reset_modal_form()
{
    $('.modal').on('hidden.bs.modal', function(){
        $("input[type=hidden]").val('0');
        $(this).find('form')[0].reset();
    });
}

$(document).ready(function(){
    send_category_data();
    category_table();
    edit_catagory();
    delete_category();
    reset_modal_form();
});
