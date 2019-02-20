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

    $("#suppLiv").on("click",function(){

        var hr="{{ path('admin_deleteLivreur',{'id':'4'}) }}";
        //hr.replace("x","4");
        $(this).attr("href",hr);
        alert($(this).attr("href"));

    });

});
