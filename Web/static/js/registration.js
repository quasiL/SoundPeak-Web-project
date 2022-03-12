var currentTab = 0; 
showTab(currentTab); 
p = document.getElementById("error_status"); // chybové hlášení 
var prev = document.getElementById("prevBtn");
var next = document.getElementById("nextBtn");

// výběr jednoho z registračních oken k zobrazení 
function showTab(n) {
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
 
  if (n == 0)               { document.getElementById("prevBtn").style.display = "none"; } 
  else                      { document.getElementById("prevBtn").style.display = "inline"; }

  if (n == (x.length - 1))  { document.getElementById("nextBtn").innerHTML = "Submit"; }

  else                      { document.getElementById("nextBtn").innerHTML = "Next"; }

  fixStepIndicator(n)
}

// správné zobrazení tlačítek pro přepínání mezi okny 
var nextBtn = function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  if (n.currentTarget.param == 1 && !validateForm()) return false;
 
  x[currentTab].style.display = "none";
  currentTab = currentTab + n.currentTarget.param;
  
  if (currentTab >= x.length) {
    document.getElementById("reg_form").submit();
    return false;
  }
  
  p.innerHTML = "";
  showTab(currentTab);
}

// funkce pro ověření všech polí 
function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  for (i = 0; i < y.length; i++) {

    if ( (y[i].value == "") && (currentTab != 2) ) {
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
    if ( currentTab == 3 && y[1].value.length < 8 && (y[0].value != "" && y[1].value != "")) {
      y[1].style.backgroundColor = '#d37575';
      p.innerHTML= "The password must be at least 8 characters long and contain numbers and letters.";
      valid = false;
    }
  }

  if (valid) { document.getElementsByClassName("step")[currentTab].className += " finish"; }
  return valid; 
}

// zobrazení kroku registrace 
function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
 
  x[n].className += " active";
} 

next.addEventListener("click", nextBtn, false);
next.param = 1;
prev.addEventListener("click", nextBtn, false);
prev.param = -1;