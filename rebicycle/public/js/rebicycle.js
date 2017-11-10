// navigation menu scrolldown
$(window).scroll(function() {
    if($(this).scrollTop()>5) {
        $( ".navbar-me" ).addClass("fixed-me");
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
    }
});

// filter balk aan zijkant
/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
} 

function scrollDown(){
    window.scrollTo(0,window.innerHeight-50);
}

function showImageBike($newImgPath,$oldImgId){
    var $oldImgPath = document.getElementById("headImageBike").src;
    this.src = $oldImgPath;
    document.getElementById("headImageBike").src = $newImgPath;
    document.getElementById($oldImgId).src=$oldImgPath;
}
