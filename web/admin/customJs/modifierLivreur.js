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

    setMapLatLng(localisation);
}
function setMapLatLng(local)
{
    let tit=local.slice(0,local.indexOf(" :"));
    local=local.slice(local.lastIndexOf(" ")+1,local.length);

    let lat=local.slice(0,local.indexOf("-"));
    let lng=local.slice(local.indexOf("-")+1,local.length);
    let iframe = document.getElementById("mapFrame");
    iframe.contentWindow.setDefaultMarkerPos(tit,lat,lng);

}
function setLatLng()
{
    var iframe = document.getElementById("mapFrame");
    var lat = iframe.contentWindow.document.getElementById("mapLat").value;
    var lng = iframe.contentWindow.document.getElementById("mapLng").value;
    var tit=iframe.contentWindow.document.getElementById("mapTit").value;

    $("#localisationLiv").val(tit+" : "+lat+"-"+lng);

}