// vyhledat album na stránce 
btn = document.getElementById("srch");
var search = function try_search() {
    location.reload();
}
btn.addEventListener("click", search);


function findAlbum() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    ul = document.getElementById("mp_list");
    li = ul.getElementsByClassName('list_container');
    
    // Tím se zobrazí všechny položky seznamu a skryjí se ty, které neodpovídají vyhledávacímu dotazu. 
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
        } else {
        li[i].style.display = "none";
        }
    }
}
    
findAlbum();  
