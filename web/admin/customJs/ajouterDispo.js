$(document).ready(function()
{

});
var livsDays=[];
function dayOfWeekName(id,dd)
{

    let res="Available every : ";
    let dates=dd.toString().split("-");

    dates.sort();

    let weekday = new Array(7);
    weekday[0] =  "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    for(let i = 0; i < dates.length; i++){
        res += weekday[dates[i]]+", ";
    }
    livsDays[id]=dates;
    while(res.slice(-1)==" " || res.slice(-1)==",")
    res=res.slice(0, -1);

    return res;

}
function showModal(row)
{
    let id=$(row).attr('data');

    $('input[type="checkbox"]').each(function () {
        $(this).attr("checked",false);
    });

    if(livsDays[id]!=null)
    {
       for(let i=0;i<livsDays[id].length;i++)
       {
           $("#chk"+livsDays[id][i]).attr("checked",true);
       }
    }
   $("#idLiv").val(id);

    $("#ajtDspModal").modal("show");
}
function submitAjtDisp()
{
    let res="";
    $('input[type="checkbox"]').each(function () {
        if($(this).is(':checked'))
            res+=$(this).val()+"-";
    });
    res=res.slice(0, -1);
    $("#selectedDays").val(res);
}
function setBg(row)
{

    if($(row).hasClass("bg-primary"))
    {

        $(this).removeClass("bg-primary");
        $(this).css('color','black');
    }
    else
    {

        $('.bg-primary').each(function(i,obj)
        {

            $(this).removeClass("bg-primary");
            $(this).css('color','black');
        });

        $(row).addClass("bg-primary");
        $(row).css('color','white');

    }

}