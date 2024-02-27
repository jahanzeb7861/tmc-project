 
window.addEventListener("load", function(){
    var load_screen = document.getElementById("load_screen");

    // Check if the element exists before trying to remove it
    if (load_screen && load_screen.parentNode) {
        load_screen.parentNode.removeChild(load_screen);
    }
});