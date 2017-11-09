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
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
} 

// rangeslider
var slider = document.getElementById("priceRange");
var output = document.getElementById("price");
output.innerHTML = slider.value; // Display the default slider value

var slider = document.getElementById("qualityRange");
var output = document.getElementById("quality");
output.innerHTML = slider.value; // Display the default slider value


// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
} 

$("#scrollDown").click(function() {
    $('html,body').animate({
        scrollTop: $(".second").offset().top},
        'slow');
});