window.addEventListener("touchstart", {})// Désactive le hover sur téléphone

//Formulaire de connexion
const formLogin = document.querySelector("#login_form");
const inputLogin = document.querySelectorAll('.login_input');
const main = document.querySelector("main");
const h1 = document.querySelector("H1");
let p = document.createElement("P");
let errorMessage = document.createTextNode("Identifiants incorrects.")

formLogin.addEventListener('submit', function(e) {
    e.preventDefault();
    ajaxLogin();
})

inputLogin.forEach(input => {
    input.addEventListener('focusin', function() {
        const loginFormInvalid = document.querySelector("#login_form_invalid");
        if (loginFormInvalid) {
            loginFormInvalid.remove();
        }
    })
    input.addEventListener('focusout', function() {
        verifLogin(input, 0);
    });
})

function checkLogin() {
    let errorCount = 0; //initialisation du compteur d'erreurs
    inputLogin.forEach((input) => {
        verifLogin(input, errorCount);
    });

    if (errorCount === 0) {
        return true;
    } else {
        return false;
    }
}

function verifLogin(input, errorCount) {
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
        }
        const loginFormInvalid = document.querySelector("#login_form_invalid");
        if (loginFormInvalid) {
            loginFormInvalid.remove();
        }
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
                    document.location.href = "admin";
                } else if (result.responseServer === true && result.connection === false) {
                    main.insertBefore(p, h1.nextSibling);
                    p.append(errorMessage);
                    p.classList.add("login_form_invalid_form");
                    p.setAttribute("id", "login_form_invalid");
                }
            });
    }
}