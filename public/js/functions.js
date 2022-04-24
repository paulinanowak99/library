// Proste funkcje JavaScript, głównie dotyczące AJAX'a

// Funkcja przechodzi do URL, podanego jako parametr 'link', po potwierdzeniu przez użytkownika.
// (wyświetla zapytanie podane jako parametr 'message')
function confirmLink(link,message) {
    if(confirm(message)) {
        window.location.href=link;
    }
}

// Funkcja wysyłająca dane formularza identyfkowanego przez 'id_form', do podanego adresu 'url'.
// Otrzymana odpowiedź zamienia zawartość elementu na stronie o identyfikatorze 'id_to_reload'.
function ajaxPostForm(id_form,url,id_to_reload)
{
    var form = document.getElementById(id_form);
    var formData = new FormData(form);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", url, true);
    xmlHttp.send(formData);
    console.log(formData);
}

function page(url, page, id_to_reload, sf_title) {
    var param = new URLSearchParams();
    param.append("page", page);
    param.append("sf_title", sf_title);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", url, true);
    xmlHttp.send(param);
}