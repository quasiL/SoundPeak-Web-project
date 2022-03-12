var currentTab = 0; 

p = document.getElementById("error_status");
var prev = document.getElementById("prevBtn");
var next = document.getElementById("nextBtn");

function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  for (i = 0; i < y.length; i++) {

    if (y[i].value == "") {
        p.innerHTML= "Empty field!";
        y[i].style.backgroundColor = '#d37575';
        valid = false;
    }
    if ( currentTab == 1 && /^[a-zA-Z]*$/.test(y[1].value) && (y[0].value != "" && y[1].value != "")) {
        y[1].style.backgroundColor = '#d37575';
        p.innerHTML= "The phone number usually consists of numbers.";
        valid = false;
    }
    if ( currentTab == 1 && y[1].value.length < 9 && (y[0].value != "" && y[1].value != "")) {
        y[1].style.backgroundColor = '#d37575';
        p.innerHTML= "The phone number is too short.";
        valid = false;
    }
  }

}





