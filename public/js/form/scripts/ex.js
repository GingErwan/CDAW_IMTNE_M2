"use strict";

function modify(e)
{
    var parent = e.currentTarget.parentNode;
    var paragraph = parent.getElementsByTagName('p')[0];
    document.getElementById('textarea').value = paragraph.textContent;
}

function deleter(e)
{
    e.currentTarget.parentNode.remove();
}

document.getElementById("addNew").addEventListener("click", function(e){
    var users = document.getElementById("users");

    var newId;

    if(users.lastElementChild != null)
    {
        newId = parseInt(users.lastElementChild.id.substring(4)) + 1;
    }
    else
    {
        newId = 1;
    }

    
    var content = "<div id='user" + newId + "'><h4>Erwan Merly</h4><p>Oui bonjour ça va ?</p><button class='modify'>Modify Comment</button><button class='remove'>Remove Comment</button></div>";
    users.innerHTML += content;

})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click",deleter));

function commentVerif(e)
{
    let valToCheck = e.currentTarget.elements[0].value;

    if(valToCheck == null || valToCheck.length == 0)
    {
        alert("ATTENTION LE CHAMP EST VIDE");
    }
}

document.forms["myForm"].addEventListener("submit", commentVerif);