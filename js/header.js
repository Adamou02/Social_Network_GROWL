var settingMenu = document.querySelector(".setting-menu");
var closeFriends = document.querySelector(".close-friends");

function settingMenuOpen(){
    
    if(settingMenu.id == "close"){
        closeFriends.style.transitionDelay = "0s";
        closeFriends.style.margin = "280px 0 0 0 ";
        settingMenu.id="open";
    }else{
        closeFriends.style.transitionDelay = "0.14s";
        closeFriends.style.margin = "0 0 0 0 ";
        settingMenu.id="close";
    }
    settingMenu.classList.toggle("setting-menu-height");
}

var darkBtn = document.getElementById("dark-mode-btn")

darkBtn.onclick = function (){
    darkBtn.classList.toggle("dark-mode-on");
    document.body.classList.toggle("dark-theme");
}