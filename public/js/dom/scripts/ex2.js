"use strict";

function descr_color_change()
{
    var elements = document.getElementsByClassName('descr');

    for(var i=0; i<elements.length; i++)
    {
        elements[i].style.backgroundColor = "red";
    }
}

function caroussel_color_change()
{
    var caroussel = document.getElementById("caroussel");
    var element = caroussel.firstElementChild;
    element.style.backgroundColor = "blue";
}

function hide_first_element()
{
    var caroussel = document.getElementById("caroussel");
    var element = caroussel.firstElementChild;
    element.style.display = "none";
}