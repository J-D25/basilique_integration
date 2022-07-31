//Chargement de la liste à l'ouverture de la page
window.addEventListener("DOMContentLoaded", () => {
    listingMail(0);
})

more = document.querySelector("#more");
more.addEventListener("click", () => {
    let recordSelected = document.querySelector("#record_select").textContent;
    listingMail(recordSelected);
})

//count : nombre d'enregistrements affichés
function listingMail(count) {
    fetch("php/list.php", {
            method: "POST",
            body: JSON.stringify(count),
            contentType: 'application/json'
        })
        .then(function(response) {
            let recordTotalNumber = response.headers.get('Record-number');
            let recordSelectNumber = response.headers.get('Select-number');
            let recordTotalNumberSpan = document.querySelector("#record_total");
            let recordSelectNumberSpan = document.querySelector("#record_select");
            if (Number(recordTotalNumber) <= Number(recordSelectNumber)) {
                recordTotalNumberSpan.textContent = recordTotalNumber;
                recordSelectNumberSpan.textContent = recordTotalNumber;
                more.setAttribute("disabled", "");
            } else {
                recordTotalNumberSpan.textContent = recordTotalNumber;
                recordSelectNumberSpan.textContent = recordSelectNumber;
                more.removeAttribute("disabled");
            }
            return response.json();
        })
        .then((results) => {
            createTable(results);//Création de la liste d'emails
        });
}

//Recherche de mails
const searchBar = document.getElementById('search');
const searchCross = document.getElementById('cross_button');
searchBar.addEventListener('input', function() {
    if (searchBar.value) {
        searchCross.style.display = "flex";
        fetch("php/search.php", {
                method: "POST",
                body: JSON.stringify(searchBar.value),
                contentType: 'application/json'
            })
            .then(function(response) {
                let recordTotalNumber = response.headers.get('Record-number');
                let recordSelectNumber = response.headers.get('Select-number');
                let recordTotalNumberSpan = document.querySelector("#record_total");
                let recordSelectNumberSpan = document.querySelector("#record_select");
                more.setAttribute("disabled", "");
                more.style.display = "none";
                if (Number(recordTotalNumber) <= Number(recordSelectNumber)) {
                    recordTotalNumberSpan.textContent = recordTotalNumber;
                    recordSelectNumberSpan.textContent = recordTotalNumber;
                } else {
                    recordTotalNumberSpan.textContent = recordTotalNumber;
                    recordSelectNumberSpan.textContent = recordSelectNumber;
                }
                return response.json();
            })
            .then((results) => {
                if (results.responseServer === true && results.responseDB === true) {
                    removeList();//Suppression de la liste d'emails existante
                    createTable(results);//Création de la liste d'emails
                }
            });
    } else {
        searchDelete();
    }
})

searchCross.addEventListener('click', function() {
    searchDelete();
    searchBar.value = "";
})

function searchDelete() {
    removeList();//Suppression de la liste d'emails existante
    more.removeAttribute("disabled");
    more.style.display = "inline-block";
    searchCross.style.display = "none";
    listingMail(0);
}

//results = liste d'emails issus de la requête
function createTable(results) {
    const tableNewsletter = results['data'];
    const template = document.querySelector("#templatemail");
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
}

//Suppression de la liste
function removeList() {
    const tBody = document.querySelector("TBODY");
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
    const popUpYesInput = clone.querySelector("#popup_thanks");
    const popUpMailIcon = clone.querySelector("#popup_mail_icon");
    popUpMailIcon.remove();
    popUpTitle.textContent = "Suppression demandée";
    popUpContent.textContent = "Êtes-vous sûr de vouloir supprimer " + mail + " ?";
    popUpYesInput.value = "Oui";
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
        popUp.remove();
        ajaxDeletion(mail, num);
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
                deletePopUp(mail);
                num.remove();
                let recordTotalNumberSpan = document.querySelector("#record_total");
                let recordSelectNumberSpan = document.querySelector("#record_select");
                recordTotalNumberSpan.textContent = Number(recordTotalNumberSpan.textContent) - 1;
                recordSelectNumberSpan.textContent = Number(recordSelectNumberSpan.textContent) - 1;
            }
        });
}

function deletePopUp(mail) {
    const template = document.querySelector("#template_contact");
    const header = document.querySelector("HEADER");
    const clone = document.importNode(template.content, true);
    const popUpTitle = clone.querySelector("#popup_title");
    const popUpContent = clone.querySelector("#popup_text");
    const popUpMailIcon = clone.querySelector("#popup_mail_icon");
    popUpMailIcon.remove();
    popUpTitle.textContent = "Suppression effectuée";
    popUpContent.textContent = mail + " a bien été supprimé.";
    header.appendChild(clone);

    let popUp = document.getElementById("popup_fond");
    document.getElementById("popup_close").addEventListener('click', function() {
        popUp.remove();
    });
    document.getElementById("popup_thanks").addEventListener('click', function() {
        popUp.remove();
    });
}