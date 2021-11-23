"use strict";

function modify(e)
{
    var parent = e.currentTarget.parentNode;
    parent.childNodes[3].innerHTML = "Modifié!";
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