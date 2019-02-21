var currLiv;

$(document).ready(function ()
{

    $(".clickable-row").click(function() {
        var id=$(this).attr("data");
        if($(this).hasClass("bg-warning"))
        {

            $(this).removeClass("bg-warning");

        }
        else
        {
            $('.bg-warning').each(function(i,obj)
            {

                $(this).removeClass("bg-warning");
            });
            $(this).addClass("bg-warning");
            currLiv=id;

        }
        showSupp();
    });

    $("#btnSubmitModif").on("click",function()
    {

    });



    $("#modifLiv").on("click",function(){

        var nom = $(".bg-warning").find("td:eq(0)").text();
        var prenom = $(".bg-warning").find("td:eq(1)").text();
        var etat = $(".bg-warning").find("td:eq(2)").text();
        var tel = $(".bg-warning").find("td:eq(3)").text();
        var localisation = $(".bg-warning").find("td:eq(4)").text();

        $("#nomLiv").attr("placeholder",nom);
        $("#prenomLiv").attr("placeholder",prenom);
       // $("#etatLiv").attr("placeholder",etat);
        $("#telLiv").attr("placeholder",tel);
        $("#localisationLiv").attr("placeholder",localisation);

    });

});

function showSupp()
{
    if($(".bg-warning").length==0)
    {
        $("#modifLiv").attr("hidden", "hidden");

    }
    else
    {
        $("#modifLiv").removeAttr("hidden");

    }

}
function sendToModal()
{

}
function submitModif()
{

     let hr="{{ path('admin_updateLivreur',{'id':"+currLiv+"}) }}";
      $("#modifForm").attr("href",hr);
      alert($("#modifForm").attr("href"));


}