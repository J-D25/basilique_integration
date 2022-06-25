const bins = document.querySelectorAll(".admin_bin");
const emails = Array.from(document.querySelectorAll(".admin_email"));

bins.forEach((bin, binIndex) => {
    bin.addEventListener("click", function() {
        const data = emails[binIndex].textContent;

        fetch("delete.php", {
                method: "POST",
                body: JSON.stringify(data),
                contentType: 'application/json'
            })
            .then(res => res.text())
            .then((results) => {
                let resultsJSON = JSON.parse(results)
                if (resultsJSON.responseServer === true && resultsJSON.responseDB === true) {
                    alert("Suppression effectuée");
                }
            });
    });
});