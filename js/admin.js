//Chargement de la liste à l'ouverture de la page
window.addEventListener("DOMContentLoaded", () => {
    listingMail("php/list.php", 0);
})

more = document.querySelector("#more");
let click = 0;
more.addEventListener("click", () => {
    click++;
    listingMail("php/more.php", click);
})

//file : nom du fichier php, count : nombre de clics.
function listingMail(file, count) {
    const template = document.querySelector("#templatemail");

    fetch(file, {
            method: "POST",
            body: JSON.stringify(count),
            contentType: 'application/json'
        })
        .then(function(response) {
            let recordTotalNumber = JSON.parse(response.headers.get('Record-number'));
            let recordSelectNumber = response.headers.get('Select-number');
            let recordTotalNumberSpan = document.querySelector("#record_total");
            let recordSelectNumberSpan = document.querySelector("#record_select");
            if (Number(recordTotalNumber.totalNumberEmail) <= Number(recordSelectNumber)) {
                recordTotalNumberSpan.textContent = recordTotalNumber.totalNumberEmail;
                recordSelectNumberSpan.textContent = recordTotalNumber.totalNumberEmail;
                more.setAttribute("disabled", "");
            } else {
                recordTotalNumberSpan.textContent = recordTotalNumber.totalNumberEmail;
                recordSelectNumberSpan.textContent = recordSelectNumber;
                more.removeAttribute("disabled");
            }
            return response.json();
        })
        .then((results) => {
            const tableNewsletter = results['data'];
            tableNewsletter.forEach((element, index) => {
                const tbody = document.querySelector("tbody");
                const clone = document.importNode(template.content, true);
                const tr = clone.querySelectorAll("tr");
                const td = clone.querySelectorAll("td");
                td[0].textContent = tableNewsletter[index]['email'];
                td[1].textContent = tableNewsletter[index]['date'];
                td[2].addEventListener("click", function() {
                    const data = td[0].textContent;
                    showPopUp(data, tr[0]); //appel de la popUp
                });
                tbody.appendChild(clone);
            });
        });
}

//Recherche de mails
const searchBar = document.getElementById('search');
searchBar.addEventListener('input', function() {
    if (searchBar.value) {
        fetch("php/search.php", {
                method: "POST",
                body: JSON.stringify(searchBar.value),
                contentType: 'application/json'
            })
            .then(function(response) {
                let recordTotalNumber = JSON.parse(response.headers.get('Record-number'));
                let recordSelectNumber = JSON.parse(response.headers.get('Select-number'));
                let recordTotalNumberSpan = document.querySelector("#record_total");
                let recordSelectNumberSpan = document.querySelector("#record_select");
                more.setAttribute("disabled", "");
                if (Number(recordTotalNumber.totalNumberEmail) <= Number(recordSelectNumber.selectNumberEmail)) {
                    recordTotalNumberSpan.textContent = recordTotalNumber.totalNumberEmail;
                    recordSelectNumberSpan.textContent = recordTotalNumber.totalNumberEmail;
                } else {
                    recordTotalNumberSpan.textContent = recordTotalNumber.totalNumberEmail;
                    recordSelectNumberSpan.textContent = recordSelectNumber.selectNumberEmail;
                }
                return response.json();
            })
            .then((results) => {
                const tableNewsletter = results['data'];
                const template = document.querySelector("#templatemail");
                if (results.responseServer === true && results.responseDB === true) {
                    removeList();
                    tableNewsletter.forEach((element, index) => {
                        const tbody = document.querySelector("tbody");
                        const clone = document.importNode(template.content, true);
                        const td = clone.querySelectorAll("td");
                        td[0].textContent = tableNewsletter[index]['email'];
                        td[1].textContent = tableNewsletter[index]['date'];
                        tbody.appendChild(clone);
                    });
                }
            });
    } else {
        removeList();
        more.removeAttribute("disabled");
        click = 0;
        listingMail("php/list.php", 0);
    }
})

//Suppression de la liste
function removeList() {
    const tBody = document.querySelector("tbody");
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    };
}

//mail : adresse mail à supprimer, num : numéro de la ligne à supprimer
function showPopUp(mail, num) {
    const template = document.querySelector("#template_contact");
    const header = document.querySelector("HEADER");
    const clone = document.importNode(template.content, true);
    const popUpTitle = clone.querySelector("#popup_title");
    const popUpContent = clone.querySelector("#popup_text");
    popUpTitle.textContent = "Suppression demandée";
    popUpContent.textContent = "Êtes-vous sûr de vouloir supprimer " + mail + " ?";
    let popUpNoInput = document.createElement("INPUT");
    popUpNoInput.setAttribute("type", "button");
    popUpNoInput.setAttribute("value", "Non");
    popUpNoInput.setAttribute("id", "popup_thanks_no");
    const popUpDiv = clone.querySelector(".button");
    popUpDiv.appendChild(popUpNoInput);

    header.appendChild(clone);

    const popUp = document.getElementById("popup_fond");
    const popUpClose = document.getElementById("popup_close");
    const popUpThx = document.getElementById("popup_thanks");
    const popUpNo = document.getElementById("popup_thanks_no");

    popUpClose.addEventListener('click', function() {
        popUp.remove();
    });
    popUpThx.addEventListener('click', function() {
        ajaxDeletion(mail, num);
        popUp.remove();
    });
    popUpNo.addEventListener('click', function() {
        popUp.remove();
    });
}

//mail : adresse mail à supprimer, num : numéro de la ligne à supprimer
function ajaxDeletion(mail, num) {
    //Appel script suppression
    fetch("php/delete.php", {
            method: "POST",
            body: JSON.stringify(mail),
            contentType: 'application/json'
        })
        .then(response => response.json())
        .then((results) => {
            if (results.responseServer === true && results.responseDB === true) {
                alert("Suppression effectuée.");
                num.remove();
                let recordTotalNumberSpan = document.querySelector("#record_total");
                let recordSelectNumberSpan = document.querySelector("#record_select");
                recordTotalNumberSpan.textContent = Number(recordTotalNumberSpan.textContent) - 1;
                recordSelectNumberSpan.textContent = Number(recordSelectNumberSpan.textContent) - 1;
            }
        });
}