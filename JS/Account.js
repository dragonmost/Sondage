/**
 * Created by 1229753 on 23/10/2015.
 */
function Pencil(DivNum)
{
    var ele = document.getElementById("normal" + DivNum);
    ele.style.display = "none";

    ele = document.getElementById("modify" + DivNum);
    ele.style.display = "block";
}

function Submit(index, stat)
{
    var ele = document.getElementById("form" + index);
    if(stat == "Mod")
        ele.setAttribute("action", "ModifyAccount.php");

    else
        ele.setAttribute("action", "DeleteAccount.php");

    ele.submit();
}

function Cross(DivNum)
{
    var ele = document.getElementById("normal" + DivNum);
    ele.style.display = "block";

    ele = document.getElementById("modify" + DivNum);
    ele.style.display = "none";
}
