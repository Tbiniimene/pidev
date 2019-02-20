var delTab=[];

$(document).ready(function ()
{
    $(".clickable-row").click(function() {
        var id=$(this).attr("data");
        console.log(id);
        if($(this).hasClass("bg-danger"))
        {
            $(this).removeClass("bg-danger");
            $(this).attr("data-delete","false");
            delTab.splice(id,1);

        }
        else
        {
            $(this).addClass("bg-danger");
            $(this).attr("data-delete","true");
            delTab[id]=id;

        }
        //href="{{ path('reserver',{'idHotel':v.id}) }}"
        var toDelete=$(this).attr("data-delete");
    });
});
