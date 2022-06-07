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
        if (!input.checkValidity()) {
            input.classList.add("contact_form_invalid");
        } else {
            input.classList.remove("contact_form_invalid");
        }
    })
})