function gallery(){
    window.location.href="gallery.php";
}
function slide1()
{
    document.getElementById("myimg1").style.transform="translatex(-100%)";
    document.getElementById("myimg1").style.transition="2s 2s";
    document.getElementById("myimg2").style.transform="translatex(-100%)";
    document.getElementById("myimg2").style.transition="2s 2s";
    document.getElementById("myimg3").style.transform="translatex(-100%)";
    document.getElementById("myimg3").style.transition="0s 0s";
    setTimeout(slide2,5000);
}
function slide2(){
    document.getElementById("myimg1").style.transform="translatex(-200%)";
    document.getElementById("myimg1").style.transition="0s 0s";
    document.getElementById("myimg2").style.transform="translatex(-200%)";
    document.getElementById("myimg2").style.transition="2s 3s";
    document.getElementById("myimg3").style.transform="translatex(-200%)";
    document.getElementById("myimg3").style.transition="2s 3s";
    setTimeout(slide3,7000);
}

function slide3()
{
    document.getElementById("myimg1").style.transform="translatex(0%)";
    document.getElementById("myimg1").style.transition="1s 0s";
    document.getElementById("myimg2").style.transform="translatex(0%)";
    document.getElementById("myimg2").style.transition="1s 0s";
    document.getElementById("myimg3").style.transform="translatex(0%)";
    document.getElementById("myimg3").style.transition="1s 0s";
    setTimeout(slide1,3000);
}







