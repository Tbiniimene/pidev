$(document).ready(function()
{
    unlockDeliv();

    $('input[type=radio]').click(function(){
        if (this.previous) {
            this.checked = false;
            $(this).removeAttr('checked');
        }
        else
        {
            $(this).attr('checked','checked');

        }
        this.previous = this.checked;
        unlockDeliv();
    });


});
var livsTab=[];
var locLivs=[];

var v="-122%";
var v2="121%";
var t=true;

function unlockDeliv()
{
    if ($("input:radio:checked").length)
    {
        if($("#localisationLiv").val()!="")
        $("#btnAddDeliv").removeAttr("disabled");
    }
    else
    {
        $("#btnAddDeliv").attr("disabled","disabled");

    }
}

function toggleTrans()
{


         if(t)
            {
                $("#chDel").attr("disabled","disabled");

                    $('#trans').css("transform","translate("+v+",0)");
                t=false;
            }
            else
            {
                $("#chDel").removeAttr("disabled");

                t=true;
                $('#trans').css("transform","translate("+v2+",0)");
            }


}
var mapData=false;
function sendDataTrans()
{
    if(!mapData)
    {
        let iframe = document.getElementById("mapFrame");
        if(typeof iframe.contentWindow.afficherMarkers === "undefined") {
            window.setTimeout(sendDataTrans, 100);
        } else {
            iframe.contentWindow.afficherMarkers(livsTab);
        }

        mapData=true;
    }

}



function getLatLng(adresse)
{
    let tit=adresse.slice(0,adresse.indexOf(" :"));
    adresse=adresse.slice(adresse.lastIndexOf(" ")+1,adresse.length);

    let lat=adresse.slice(0,adresse.indexOf("-"));
    let lng=adresse.slice(adresse.indexOf("-")+1,adresse.length);

    let data=[];
    data.push(tit);
    data.push(lat);
    data.push(lng);

    return data;

}
function setLatLng()
{
    var iframe = document.getElementById("mapFrame");
    var lat = iframe.contentWindow.document.getElementById("mapLat").value;
    var lng = iframe.contentWindow.document.getElementById("mapLng").value;
    var tit=iframe.contentWindow.document.getElementById("mapTit").value;

    $("#localisationLiv").val(tit+" : "+lat+"-"+lng);

    let currLoc=$("#localisationLiv").val();
    locLivs.forEach(function(liv)
    {
       if(currLoc==liv.loc)
       {
           $("#localisationLiv").val(liv.id);
            return;
       }
    });


    $("#btnAddDeliv").removeAttr("disabled");

}
var currComPrice=0;
var currResPrice=0;
function calculTot(obj,name,price)
{
    if(!$(obj).attr("checked"))
    {
        if(name=="com")
            currComPrice=price;
        else
            currResPrice=price;

    }
    else
    {
        if(name=="com")
            currComPrice=0;
        else
            currResPrice=0;
    }
    if($('input[type=radio]').length>0)
    $("#totLiv").val(currResPrice+currComPrice);

}

window.setLatLngW=function(){
    setLatLng();
    $("#saveLoc").removeAttr("disabled");
};
