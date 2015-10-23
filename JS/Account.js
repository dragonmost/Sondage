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

function Trash()
{

}

function Check()
{

}

function Cross(DivNum)
{
    var ele = document.getElementById("normal" + DivNum);
    ele.style.display = "block";

    ele = document.getElementById("modify" + DivNum);
    ele.style.display = "none";
}