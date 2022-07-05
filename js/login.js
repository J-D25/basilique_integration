const formLogin = document.querySelector("#login_form");
const inputLogin = document.querySelectorAll('.login_input');
const btnSubmitLogin = document.querySelector('#login_button');

formLogin.addEventListener('submit', function(e) {
    e.preventDefault();
    checkLogin();
    ajaxLogin();
});

function checkLogin() {
    inputLogin.forEach((input) => {
        const input_span = document.createElement("SPAN");
        const cannot = "Ce champ ne peut être vide";
        let input_span_text = document.createTextNode(cannot);
        input_span.appendChild(input_span_text);
        input_spanInvalid = document.getElementById(input.id + "_invalid");
        input_span.setAttribute("class", "login_form_span_invalid");
        input_span.setAttribute("id", input.id + "_invalid");
        if (input.validity.valueMissing) {
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
        }
    })
}

function ajaxLogin() {
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
            }
        })
}