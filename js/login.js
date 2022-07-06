//Formulaire de connexion
const formLogin = document.querySelector("#login_form");
const inputLogin = document.querySelectorAll('.login_input');

formLogin.addEventListener('submit', function(e) {
    e.preventDefault();
    ajaxLogin();
});

function checkLogin() {
    let errorCount = 0; //initialisation du compteur d'erreurs
    inputLogin.forEach((input) => {
        const input_span = document.createElement("SPAN");
        const cannot = "Ce champ ne peut être vide";
        let input_span_text = document.createTextNode(cannot);
        input_span.appendChild(input_span_text);
        input_spanInvalid = document.getElementById(input.id + "_invalid");
        input_span.setAttribute("class", "login_form_span_invalid");
        input_span.setAttribute("id", input.id + "_invalid");
        if (input.validity.valueMissing) {
            errorCount++;
            input.classList.add("login_form_invalid");
            if (!input_spanInvalid) {
                input.insertAdjacentElement('afterend', input_span);
            } else {
                input_spanInvalid.replaceWith(input_span);
            }
        } else {
            input.classList.remove("login_form_invalid");
            if (input_spanInvalid) {
                input_spanInvalid.remove();
            };
        }
    });

    if (errorCount === 0) {
        return true;
    } else {
        return false;
    }
}

function ajaxLogin() {
    if (checkLogin()) { //Lancement de checkLogin() + lancement requête si pas d'erreur.
        const formData = new FormData(formLogin);
        fetch("php/log.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then((result) => {
                if (result.responseServer === true && result.responseDB === true && result.connection === true) {
                    document.location.href = "admin.php";
                } else if (result.responseServer === true && result.responseDB === true && result.connection === false) {
                    alert("Identifiant ou mot de passe incorrect.");
                }
            });
    }
}