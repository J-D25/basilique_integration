window.addEventListener("DOMContentLoaded", () => {
    listingMail();
})

function listingMail() {
    // const tBody = document.querySelector("TBODY");
    // tBody.remove();
    const template = document.querySelector("#templatemail");

    fetch("list.php")
        .then(res => res.text())
        .then((results) => {
            const resultsJSON = JSON.parse(results);
            const tableNewsletter = resultsJSON['data'];
            let i = 0;
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
                        fetch("delete.php", {
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