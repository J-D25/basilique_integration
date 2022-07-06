//Formulaire de contact
const formContact = document.querySelector('#contact_form');

formContact.addEventListener('submit', function(e) {
    e.preventDefault();
    ajaxFormContact();
})

function checkFormContact() {
    const inputs = document.querySelectorAll('.contact_form_input');
    let errorCount = 0; //initialisation du compteur d'erreurs
    inputs.forEach((input) => {
        const input_span = document.createElement("SPAN");
        const cannot = "Ce champ ne peut être vide";
        let input_span_text = document.createTextNode(cannot);
        input_span.appendChild(input_span_text);
        input_spanInvalid = document.getElementById(input.id + "_invalid");
        input_span.setAttribute("class", "contact_form_span_invalid");
        input_span.setAttribute("id", input.id + "_invalid");
        if (input.validity.valueMissing) {
            errorCount++;
            input.classList.add("contact_form_invalid");
            if (!input_spanInvalid) {
                input.insertAdjacentElement('afterend', input_span);
            } else {
                input_spanInvalid.replaceWith(input_span);
            }
        } else {
            input.classList.remove("contact_form_invalid");
            if (input_spanInvalid) {
                input_spanInvalid.remove();
            }
        }
    })

    let email = document.getElementById("contact_form_email");
    if (email.validity.typeMismatch) {
        errorCount++;
        const email_span = document.createElement("SPAN");
        const email_span_text = document.createTextNode(email.value + " n'est pas une adresse email valide");
        email_span.appendChild(email_span_text);
        email.classList.add("contact_form_invalid");
        email.insertAdjacentElement('afterend', email_span);
        email_span.setAttribute("id", "contact_form_email_invalid");
        email_span.setAttribute("class", "contact_form_span_invalid");
    } else if (!email.validity.valueMissing) {
        email_spanInvalid = document.getElementById("contact_form_span_invalid");
        email.classList.remove("contact_form_invalid");
        if (email_spanInvalid) {
            email_spanInvalid.remove();
        }
    }

    if (errorCount === 0) {
        return true;
    } else {
        return false;
    }
}

function ajaxFormContact() {
    if (checkFormContact()) { //Lancement de checkFormContact() + lancement requête si pas d'erreur.
        const data = new FormData(formContact);

        fetch("php/mail.php", { method: "POST", body: data })
            .then(response => response.json())
            .then((results) => {
                if (results.response === true) {
                    showPopUp();
                    formContact.reset();
                }
            });
        return false;
    }
}

function showPopUp() {
    let forma = document.getElementById("contact_form");
    let div1 = document.createElement("div");
    div1.setAttribute("id", "popup_fond");
    forma.insertAdjacentElement('afterend', div1);
    let div2 = document.createElement("div");
    div2.setAttribute("id", "popup_wrapper");
    div1.append(div2);
    let div3 = document.createElement("div");
    div3.setAttribute("id", "popup_center");
    div2.append(div3);
    let p1 = document.createElement("p");
    p1.setAttribute("id", "popup_close");
    div3.append(p1);
    p1Content = document.createTextNode("X");
    p1.append(p1Content);
    let p2 = document.createElement("p");
    p2.setAttribute("id", "popup_text");
    div3.append(p2);
    p2Content = document.createTextNode("Votre message a bien été envoyé.");
    p2.append(p2Content);

    let div4 = document.createElement("div");
    div4.setAttribute("class", "button");
    div3.append(div4);
    let inpt = document.createElement("input");
    inpt.setAttribute("type", "button");
    inpt.setAttribute("value", "Merci");
    inpt.setAttribute("id", "popup_thanks");
    div4.append(inpt);

    let popUp = document.getElementById("popup_fond")
    document.getElementById("popup_close").addEventListener('click', function() {
        popUp.remove();
    })
    document.getElementById("popup_thanks").addEventListener('click', function() {
        popUp.remove();
    })
}