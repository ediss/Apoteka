function vrednostLeka(str) {
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       document.getElementById("poKomadu").innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "ajax.php?q="+str, true);
xhttp.send();
}



