var Lopen = document.getElementsByClassName("logout_a")[1];
var Aopen = document.querySelectorAll("a")[5];
var LAopen = document.querySelectorAll("li")[1];
var Sclose = document.getElementById("cancel");
var Forgot = document.querySelectorAll("a")[7];

// otevírání a zavírání přihlašovacího okna 
var login = function login() {
    document.getElementById("login_form").style.display = "inline"; 
} 

var closeLogin = function close_login() {
    document.getElementById("login_form").style.display = "none";
}

Sclose.addEventListener("click", closeLogin);

Lopen.addEventListener("click", login);
Aopen.addEventListener("click", login);
LAopen.addEventListener("click", login);

//rada
var forgot = function forgot() {
    alert("Try to remember it!"); 
}
Forgot.addEventListener("click", forgot);

