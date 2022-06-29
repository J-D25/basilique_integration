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
    let checkbox = document.getElementById("menu_check");
    checkbox.addEventListener('click', event => {
        var hook = document.getElementById("header_hook");

        if (document.getElementById('menu_check').checked) {
            hook.style.display = "none";
        } else {
            hook.style.display = "flex";
        }
    })

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

const formNewsletter = document.querySelector('#newsletter');
const inputNewsletter = document.querySelector('#newsletter_email');
const btnSubmitNewsletter = document.querySelector('#newsletter_button');
const pNewsResult = document.querySelector('#newsletter_result');

formNewsletter.addEventListener('submit', function(e) {
    e.preventDefault();
    checkNewsletter();
    ajaxpost2();
});

inputNewsletter.addEventListener('focusin', function() {
    inputNewsletter.classList.remove("newsletter_invalid");
    pNewsResult.removeAttribute('class');
    pNewsResult.textContent = " ";
})

inputNewsletter.addEventListener('focusout', function() {
    checkNewsletter();
});

function checkNewsletter() {
    if (inputNewsletter.validity.valueMissing || inputNewsletter.validity.typeMismatch) {
        inputNewsletter.classList.add("newsletter_invalid");
        pNewsResult.classList.add("newsletter_p_invalid");
        if (inputNewsletter.validity.valueMissing) {
            pNewsResult.textContent = "Le champ est vide.";
        } else if (inputNewsletter.validity.typeMismatch) {
            pNewsResult.textContent = inputNewsletter.value + " n'est pas une adresse email valide.";
        }
    } else {
        inputNewsletter.classList.remove("newsletter_invalid");
        pNewsResult.removeAttribute('class');
        pNewsResult.textContent = " ";
    }
}

function ajaxpost2() {
    if (formNewsletter.checkValidity()) {
        const data = new FormData(formNewsletter);

        fetch("php/news.php", { method: "POST", body: data })
            .then(res => res.text())
            .then((results) => {
                let resultsJSON = JSON.parse(results)
                if (resultsJSON.responseServer === true && resultsJSON.responseDB === true) {
                    formNewsletter.reset();
                    pNewsResult.textContent = "Votre adresse email a été enregistrée.";
                    pNewsResult.classList.add("newsletter_p_valid");
                } else if (resultsJSON.responseServer === true && resultsJSON.responseDB === "23000") {
                    inputNewsletter.classList.add("newsletter_invalid");
                    pNewsResult.classList.add("newsletter_p_invalid");
                    pNewsResult.textContent = "Cette adresse email est déjà enregistrée.";
                } else {
                    inputNewsletter.classList.add("newsletter_invalid");
                    pNewsResult.classList.add("newsletter_p_invalid");
                    pNewsResult.textContent = "Une erreur s'est produite.";
                }
            });
        return false;
    }
}