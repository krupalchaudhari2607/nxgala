window.addEventListener("scroll",function(){
    var header= document.querySelector("header");
    header.classList.toggle("stiky",window.scrollY > 0);
})
var MenuItems=document.getElementById("MenuItems");
MenuItems.style.maxHeight ="0";   



function menutoggle() {
if (MenuItems.style.maxHeight == "0px") {
    MenuItems.style.maxHeight ="200px";
    MenuItems.style.display="block"
    MenuItems.style.background="cadetblue"
    MenuItems.style.position="absolute"
    MenuItems.style.top="50px"
    MenuItems.style.left="0"
    MenuItems.style.width="100%"
}else{
    MenuItems.style.maxHeight ="0px";
    MenuItems.style.display="none"
}

}