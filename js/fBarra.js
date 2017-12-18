var a=0;
function fBarra() {
    s=document.body.scrollTop;
    if (s>1){
        document.getElementById("header").style.top="0px";
    }
    if (s==0){ document.getElementById("header").style.top="55px";}
    }
function barraServicios(){
    a=1-a;
    if (a==1) {
        document.getElementById("principales").style.display="none";
        document.getElementById("secundarios").style.display="flex";
    } else{
        document.getElementById("principales").style.display="flex";
        document.getElementById("secundarios").style.display="none";
    }
}