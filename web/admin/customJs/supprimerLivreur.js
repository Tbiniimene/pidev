var delTab=[];
$(document).ready(function ()
{

    $(".clickable-row").click(function() {
        var id=$(this).attr("data");
        if($(this).hasClass("bg-danger"))
        {
            $(this).removeClass("bg-danger");
            delTab.splice(id,1);

        }
        else
        {
            $(this).addClass("bg-danger");
            delTab[id]=id;

        }
        showSupp();
    });



    $("#suppLiv").on("click",function(){
        let hr="/pidev/web/app_dev.php/admin/deleteLivreur/"+getAllIds();
        $(this).attr("href",hr);


    });

});
function getAllIds()
{
    let res="null";
    let tabLength=delTab.length;
    if(tabLength!='0')
    {
        res="";
        for(let i=0;i<tabLength;i++)
        {
            if(delTab[i]!=null)
            {
                res+=delTab[i]+"-";
            }

        }
    }
    res=res.slice(0, -1);
    return res;
}
function showSupp()
{
    if($(".bg-danger").length==0)
    {
        $("#suppLiv").attr("hidden", "hidden");

    }
    else
    {
        $("#suppLiv").removeAttr("hidden");

    }

}