let checkbox = document.getElementById("menu_check");
checkbox.addEventListener('click', event => {
    var hook = document.getElementById("header_hook");

    if (document.getElementById('menu_check').checked) {
        hook.style.display = "none";
    } else {
        hook.style.display = "flex";
    }
})

const form = document.querySelector('form');
const btnSubmit = document.querySelector('#contact_form_button');

form.addEventListener('submit', function(e) {
    if (!form.checkValidity()) {
        e.preventDefault()
    }

    const inputs = document.querySelectorAll('.contact_form_input');
    inputs.forEach((input) => {
        const input_span = document.createElement("SPAN");
        const cannot = "Ce champ ne peut être vide";
        let input_span_text = document.createTextNode(cannot);
        input_span.appendChild(input_span_text);
        input_spanInvalid = document.getElementById(input.id + "_invalid");
        input_span.setAttribute("class", "contact_form_span_invalid");
        input_span.setAttribute("id", input.id + "_invalid");
        if (input.validity.valueMissing) {
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
})

if (window.matchMedia("(min-width: 765px)").matches) {
let timer = null;
window.addEventListener('scroll', function() {
    if (timer !== null) {
        clearTimeout(timer);
        document.getElementById("menu").classList.add("nofixed");
        setTimeout(function() {
            document.getElementById("menu").classList.remove("fixed");
            document.getElementById("header_title").style.marginTop = null;
        }, 400);
    }
    timer = setTimeout(function() {
        document.getElementById("menu").classList.add("fixed");
        document.getElementById("header_title").style.marginTop = "6rem";
        document.getElementById("menu").classList.remove("nofixed");
    }, 1000);
}, false);
}