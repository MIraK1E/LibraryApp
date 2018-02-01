function member_table()
{
    $("#member_table").DataTable(
    {
        responsive: true,
        ajax: {url:'member/index',type: "POST",data:({getdata:true})},
        language: { search: "",emptyTable: "No data available in table"}
    });

    $('<label>Show:' +
        ' <select class="form-control form-control-sm select_extend">'+
        '<option value="Active" selected>Active</option>'+
        '<option value="InActive">InActive</option>'+
        '</select> status</label>').insertBefore(".dataTables_filter label");

    $(".dataTables_filter").addClass("row");
    $(".dataTables_filter label").addClass("col-lg-6 col-12 text-center");

    $('.dataTables_filter>label>input[type="search"]').wrap('<div class="input-group"></div>');
    $('<div class="input-group-prepend">'+
        '<span class="input-group-text">'+
                '<i class="fa fa-search fa-fw ml-2 mr-2"></i>'+
        '</span>').insertBefore('.dataTables_filter>label>.input-group>input[type="search"]');
    $('.dataTables_filter input').css({'margin-left':'0px','width':'1%'});
    $('.dataTables_filter .input-group-text').css('padding','.2rem');
}

function search()
{
    $.fn.dataTable.ext.search.push(
        function(setting, data, dataIndex){
            var search_status = $('.select_extend').val();
            var data_status = data[4];

            if(search_status == data_status)
            {
                return true;
            }
            return false;
        });
}

function search_by_status()
{
    var table = $("#member_table").DataTable();
    $('.select_extend').on( 'change', function () {
        table.draw();
    });
}

function send_member_data()
{
    $("#member_form").submit(function(e){
        e.preventDefault();
        $.post('member/index',
        {
            idMember : $("input[name=idMember]").val(),
            Mem_name : $("input[name=Mem_name]").val(),
            Mem_tel : $("input[name=Mem_tel]").val(),
            Mem_email : $("input[name=Mem_email]").val()
        },
        function()
        {
            $('#member_form')[0].reset();
            $("input[type=hidden]").val('0');
            $("#member_form_modal").modal('hide');
            $("#member_table").DataTable().ajax.reload();
        });
    });
}

function view_member()
{
    $(document).on("click","#view",function(){
        $.post('member/index',
        {
            getviewdata : $(this).val()
        },
        function(response)
        {
            console.log(response);
            var data = $.parseJSON(response);
            $("#clear").val(data.member.idMember);
            $(".full-history").attr("href", window.location.href+'/viewhistory/'+data.member.idMember);
            $("#view_Mem_name").html('<i class="fa fa-address-card fa-fw"></i> '+data.member.Mem_name);
            $("#view_Mem_email").html('<i class="fa fa-envelope fa-fw"></i> '+data.member.Mem_email);
            $("#view_Mem_tel").html('<i class="fa fa-phone fa-fw"></i> '+data.member.Mem_tel);
            $("#Fine").html('<i class="fa fa-credit-card fa-fw"></i> Fine : '+data.fine);

            if(data.historytable.idLoan != null)
            {
                $("#history_table")
                .html("<tr>"+
                        "<td>"+data.historytable.idLoan+"</td>"+
                        "<td>"+data.historytable.Loan_date+"</td>"+
                        "<td>"+data.historytable.book+"</td>"+
                     "</tr>");
            }
            else
            {
                $("#history_table").html("<tr><td colspan='3'>no data</td></tr>")
            }
        });
    });

}

function edit_member()
{
    $(document).on("click","#edit",function(){
        $("#btn-edit").show();
        $("#btn-add").hide();
        $.post('member/index',
        {
            getindividualdata : $(this).val()
        },
        function(response){
            var data = $.parseJSON(response);
            $("input[name=idMember]").val(data.idMember);
            $("input[name=Mem_name]").val(data.Mem_name);
            $("input[name=Mem_tel]").val(data.Mem_tel);
            $("input[name=Mem_email]").val(data.Mem_email);
        });
    });
}

function reset_modal_form()
{
    $('.modal').on('hidden.bs.modal', function(){
        $("input[type=hidden]").val('0');
        $(this).find('form')[0].reset();
    });
}

function add_btn()
{
    $(document).on("click","#add",function()
    {
        $("#btn-edit").hide();
        $("#btn-add").show();
    });
}

function mask_input()
{
    $("input[name=Mem_tel]").mask("(000) 000-0000");
}

function update_member_status()
{
    $(document).on('click','#Status',function(){
        var idMember = $(this).attr('data-id');
        var status = $(this).attr('data-value');
        setTimeout(function(){
            $.post('member/index',
            {
                idMember : idMember,
                status : status
            },
            function()
            {
                $("#member_table").DataTable().ajax.reload();
            });
        },400);
    });
}

function clearfine()
{
    $(document).on("click","#clear",function(){
        $.post('member/index',
            {
                clearfine : true,
                idMember : $(this).val()
            },
            function(response)
            {
                $("#Fine").html('<i class="fa fa-credit-card fa-fw"></i> Fine : '+response);
            });
    });
}

$(document).ready(function()
{
    member_table();
    send_member_data();
    view_member();
    edit_member();
    reset_modal_form();
    add_btn();
    search_by_status();
    search();
    mask_input();
    update_member_status();
    clearfine();
});
