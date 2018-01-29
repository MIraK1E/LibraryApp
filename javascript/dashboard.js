function dashboard()
{
    $.post('dashboard/index',
        {
            dashboard : true
        },
        function(response)
        {
            var data = $.parseJSON(response);
            catagorychart(data.categorygraph);
            transactionchart(data.transactiongraph);
            $("#book_amount").html("In Library : "+data.book);
            $("#member_active").html("Active Member : "+data.member);
            $("#fine_amount").html("Amount : "+data.amount);
            $("#debt").html("Not Pay : "+data.debt);
        });
}

function catagorychart(grahpdata)
{
    Morris.Donut(
        {
            element: 'catagorychart',
            data: grahpdata
        });
}

function transactionchart(data)
{
    Morris.Line(
        {
            element: 'transaction',
            data: data,
            xkey: 'date',
            ykeys: ['value'],
            labels: ['Borrowed'],
            xLabelAngle: 60,
            resize: true

        });
}

$(document).ready(function(){
    dashboard();
});
