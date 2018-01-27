function history_table()
{
    $("#history_table").DataTable(
    {
        responsive: true,
        ajax: {url:'history/index',type: "POST",data:({getdata:true})},
    });
}

$(document).ready(function(){
    history_table();
});
