/**
 * Created by 1229753 on 15/10/2015.
 */
function displayLstAccount(name, isAdmin)
{
    var ele = document.getElementById('lstAccount');
    var liste = document.createElement("li");
    var divNorm = document.createElement("div");
    divNorm.setAttribute("id", "normal");
    var divMod = document.createElement("div");
    divMod.setAttribute("id", "modify");

    //mon div normal
    var lblNorm = document.createElement("label");
    lblNorm.appendChild(document.createTextNode(name));
    var pencil = document.createElement("a");
    var pencilSpan = document.createElement("span");
    pencilSpan.setAttribute("class", "glyphicon glyphicon-pencil");
    pencilSpan.setAttribute("aria-hidden", "true");
    pencil.appendChild(pencilSpan);
    pencil.setAttribute("class", "Account-Management");
    pencil.setAttribute("href", "#");
    var trash = document.createElement("a");
    var trashSpan = document.createElement("span");
    trashSpan.setAttribute("class", "glyphicon glyphicon-trash");
    trashSpan.setAttribute("aria-hidden", "true");
    trash.appendChild(trashSpan);
    trash.setAttribute("class", "Account-Management");
    trash.setAttribute("href", "#");

    //mon div de modifier
    var input = document.createElement("input");
    input.setAttribute("type", "email");
    input.setAttribute("placeholder", name);


    divNorm.appendChild(lblNorm);
    divNorm.appendChild(pencil);
    divNorm.appendChild(trash);
    divMod.appendChild(input);
    liste.appendChild(divNorm);
    liste.appendChild(divMod);
    ele.appendChild(liste);


/*
 <a class="Account-Management" href="#"><span class="glyphicon glyphicon-pencil"
 aria-hidden="true"></span></a>
 <a class="Account-Management" href="#"><span class="glyphicon glyphicon-trash"
 aria-hidden="true"></span></a>


 <div id="modify">
    <input type="email" placeholder="Sam@kek.lol">
    <label>isAdmin</label>
    <input type="checkbox">
    <a class="Account-Management" href="#"><span class="glyphicon glyphicon-ok"
        aria-hidden="true"></span></a>
    <a class="Account-Management" href="#"><span class="glyphicon glyphicon-remove"
        aria-hidden="true"></span></a>
 </div>


 */
}
