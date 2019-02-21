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

    $("#modifLiv").on("click",function(){

      sendToModal();
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
    var nom = $(".bg-warning").find("td:eq(0)").text();
    var prenom = $(".bg-warning").find("td:eq(1)").text();
    var etat = $(".bg-warning").find("td:eq(2)").text();
    var tel = $(".bg-warning").find("td:eq(3)").text();
    var localisation = $(".bg-warning").find("td:eq(4)").text();

    $("#nomLiv").attr("placeholder",nom);
    $("#nomLiv").val(nom);
    $("#prenomLiv").attr("placeholder",prenom);
    $("#prenomLiv").val(prenom);
    $("#etatLiv").val(etat);
    $("#telLiv").attr("placeholder",tel);
    $("#telLiv").val(tel);
    $("#localisationLiv").attr("placeholder",localisation);
    $("#localisationLiv").val(localisation);
    $("#idLiv").val(currLiv);

}
function submitModif()
{
   // let hr="/pidev/web/app_dev.php/admin/updateLivreur/"+currLiv;

    // let hr="{{ path('admin_updateLivreur',{'id':"+currLiv+"}) }}";

     // $("#modifForm").attr("action",hr);


}