$(document).ready(function()
{

});
var livsDays=[];
function dayOfWeekName(id,dd)
{

    let dates=dd.toString().split("-");

    dates.sort();
    livsDays[id]=dates;

}

function setBg(row)
{

    if($(row).hasClass("bg-primary"))
    {

        $(row).removeClass("bg-primary");
        $(row).css('color','black');
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

var v="-102%";
var v2="101%";
var t=true;
var lastId="";

function fns(row)
{

    let id=$(row).attr('data');
    $("#idLiv").val(id);

    if(lastId==id)
    {

         if(t)
            {
                sendDataTrans(id);

                    $('#trans').css("transform","translate("+v+",0)");
                t=false;
            }
            else
            {

                t=true;
                $('#trans').css("transform","translate("+v2+",0)");
            }
    }
    else
    {


            if(lastId=="")
            {
                sendDataTrans(id);


                $('#trans').css("transform","translate("+v+",0)");

            }
            else
            {
                $('#trans').css("transform","translate("+v2+",0)");

                setTimeout(
                    function()
                    {
                        sendDataTrans(id);
                        $('#trans').css("transform","translate("+v+",0)");


                    }, 500);
            }
        t=false;
    }
    lastId=id;

}
function sendDataTrans(id)
{

    $("#transTr").empty();
    let addRed=true;
    if(livsDays[id]!=null)
    {
        $("#delTrans").removeAttr("disabled");

        if( livsDays[id][0]==0) {

            livsDays[id][0]=7;
        }

            for(let i=1;i<=7;i++)
        {

            for(let j=0;j<livsDays[id].length;j++)
            {

                if(i==livsDays[id][j])
                {
                    $("#transTr").append("<td class='squareGreen'></td>");
                    addRed=false;
                    break;
                }

            }

            if(addRed)
            {
                 $("#transTr").append("<td class='squareRed'></td>");

            }
            addRed=true;
        }
    }
    else
    {
        $("#transTr").append("<td colspan='7'><h3 class='addWork'><center>Add the Work Days first !</center></h3></td>");
        $("#delTrans").attr("disabled","disabled");
    }
}
