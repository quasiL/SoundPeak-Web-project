//po kliknutí zvětšit obal alba 
var current = 0;
var img = document.getElementsByClassName("cover")[0];

var image = function increase() {
    x = document.getElementsByClassName("cover");
    if (current == 0) {
        x[0].style.width = "700px";
        x[0].style.height = "700px";
        x[0].style.position = "absolute";
        x[0].style.cursor = "zoom-out";
        current = 1; 
    }
    else {
        x[0].style.width = "400px";
        x[0].style.height = "400px";
        x[0].style.position = "relative";
        x[0].style.cursor = "zoom-in";
        current = 0; 
    }
}

img.addEventListener("click", image);


