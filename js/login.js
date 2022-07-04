const formLogin = document.querySelector("#login_form");

formLogin.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(formLogin);
    fetch("php/log.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then((results) => {
            let resultsJSON = JSON.parse(results);
            if (resultsJSON.responseServer === true && resultsJSON.responseDB === true && resultsJSON.connection === true) {
                document.location.href = "admin.php";
            } else if (resultsJSON.responseServer === true && resultsJSON.responseDB === true && resultsJSON.connection === false) {
                alert("Identifiant ou mot de passe incorrect.");
            } else if (resultsJSON.responseServer === false) {
                alert("Merci de remplir tous les champs.");
            } else {
                alert("Une erreur s'est produite.");
            }
        })
});