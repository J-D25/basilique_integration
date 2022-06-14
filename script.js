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
        let header = document.querySelector("header");
        let scrollY = this.scrollY;
        if (timer !== null) {
            clearTimeout(timer);
            document.getElementById("menu").classList.add("nofixed");
            setTimeout(function() {
                document.getElementById("menu").classList.remove("fixed");
                document.getElementById("header_title").style.marginTop = null;
            }, 400);
        }
        if (scrollY > header.clientHeight) {
            timer = setTimeout(function() {
                document.getElementById("menu").classList.add("fixed");
                document.getElementById("header_title").style.marginTop = "6rem";
                document.getElementById("menu").classList.remove("nofixed");
            }, 1000);
        }
    }, false);
}

if (window.matchMedia("(max-width: 765px)").matches) {
    let menu = document.querySelector("label")
    let i = 0
    menu.addEventListener('click', function() {
        i = i + 1
        if (i % 2 == 1) {
            document.querySelector("ul").classList.remove("close");
            document.querySelector("ul").classList.add("open");
        } else {
            document.querySelector("ul").classList.remove("open");
            document.querySelector("ul").classList.add("closing");
            document.querySelector("ul").classList.add("close");
            timer = setTimeout(function() {
                document.querySelector("ul").classList.remove("closing");
            }, 600);
        }
    })
}

let imgs = document.querySelectorAll("img");
imgs.forEach((img) => {
    let rect = img.getBoundingClientRect()
    window.addEventListener('scroll', function() {
        let scrollY = this.scrollY;
        if ((scrollY + window.innerHeight) >= (rect.y + 25)) {
            img.classList.add("imagefixed");
        } else {
            img.classList.remove("imagefixed");
        }
    });
});


function ajaxpost() {
    // (B1) GET FORM DATA
    let form = document.getElementById("contact_form");
    if (form.checkValidity()) {
        var data = new FormData(form);
        console.log(data)

        // (B2) AJAX POST
        fetch("mail.php", { method: "POST", body: data })
            .then(res => res.text())
            .then((results) => {
                if (results == "Votre message a bien été envoyé.") {
                    popup();
                    form.reset();
                }
            });
        return false;
    }
}

function popup() {
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

    document.getElementById("popup_close").addEventListener('click', function() {
        document.getElementById("popup_fond").remove();
    })
}