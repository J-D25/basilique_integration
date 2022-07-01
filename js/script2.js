window.addEventListener("DOMContentLoaded", () => {
    listingMail("php/list.php", 0);
})

more = document.querySelector("#more");
let click = 0;
more.addEventListener("click", () => {
    click++;
    listingMail("php/more.php", click);
})

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
            let recordNumberSpan = document.querySelector("#record");
            if (Number(recordTotalNumber.totalNumberEmail) <= Number(recordSelectNumber)) {
                recordNumberSpan.textContent = "Affichage de tous les enregistrements (" + recordTotalNumber.totalNumberEmail + ").";
            } else {
                recordNumberSpan.textContent = "Affichage de " + recordSelectNumber + " enregistrements sur " + recordTotalNumber.totalNumberEmail + ".";
            }
            return response.text();
        })
        .then((results) => {
            const resultsJSON = JSON.parse(results);
            const tableNewsletter = resultsJSON['data'];
            tableNewsletter.forEach((element, index) => {
                const tbody = document.querySelector("tbody");
                const clone = document.importNode(template.content, true);
                const tr = clone.querySelectorAll("tr");
                const td = clone.querySelectorAll("td");
                td[0].textContent = tableNewsletter[index]['email'];
                td[1].textContent = tableNewsletter[index]['date'];
                td[2].addEventListener("click", function() {
                    const data = td[0].textContent;
                    const dialog = confirm("Voulez-vous supprimer " + data + " ?");
                    if (dialog) {
                        fetch("php/delete.php", {
                                method: "POST",
                                body: JSON.stringify(data),
                                contentType: 'application/json'
                            })
                            .then(res => res.text())
                            .then((results) => {
                                let resultsJSON = JSON.parse(results)
                                if (resultsJSON.responseServer === true && resultsJSON.responseDB === true) {
                                    alert("Suppression effectuée.");
                                    tr[0].remove();
                                }
                            });
                    }
                });
                tbody.appendChild(clone);
            });
        });
}

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
                let recordNumberSpan = document.querySelector("#record");
                if (Number(recordTotalNumber.totalNumberEmail) <= Number(recordSelectNumber.selectNumberEmail)) {
                    recordNumberSpan.textContent = "Affichage de tous les enregistrements (" + recordTotalNumber.totalNumberEmail + ").";
                } else {
                    recordNumberSpan.textContent = "Affichage de " + recordSelectNumber.selectNumberEmail + " enregistrements sur " + recordTotalNumber.totalNumberEmail + ".";
                }
                return response.text();
            })
            .then((results) => {
                const resultsJSON = JSON.parse(results);
                const tableNewsletter = resultsJSON['data'];
                const template = document.querySelector("#templatemail");
                if (resultsJSON.responseServer === true && resultsJSON.responseDB === true) {
                    removeList();
                    tableNewsletter.forEach((element, index) => {
                        const tbody = document.querySelector("tbody");
                        const clone = document.importNode(template.content, true);
                        const tr = clone.querySelectorAll("tr");
                        const td = clone.querySelectorAll("td");
                        td[0].textContent = tableNewsletter[index]['email'];
                        td[1].textContent = tableNewsletter[index]['date'];
                        tbody.appendChild(clone);
                    });
                }
            });
    } else {
        removeList();
        click = 0;
        listingMail("php/list.php", 0);
    }
})

function removeList() {
    const tBody = document.querySelector("tbody");
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    };
}