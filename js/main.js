

window.onload = function(){
    var x = document.getElementById("gallery");
    x.addEventListener("click", myFunction);
}

function myFunction()
{
    window.location = "gallery.php";
}


function regtoggle()
{
    var x = document.getElementById("regdiv");
    var y = document.getElementById("logindiv");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}