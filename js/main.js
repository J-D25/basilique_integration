// Apparition de la navbar 1 sec après l'arrêt du scroll
if (window.matchMedia("(min-width: 765px)").matches) {
    let timer = null;
    window.addEventListener('scroll', function() {
        const header = document.querySelector("header");
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

// Responsive téléphone
if (window.matchMedia("(max-width: 765px)").matches) {
    // Retrait #header_hook à l'ouverture du menu burger
    const checkbox = document.getElementById("menu_check");
    checkbox.addEventListener('click', event => {
        const hook = document.getElementById("header_hook");

        if (document.getElementById('menu_check').checked) {
            hook.style.display = "none";
        } else {
            hook.style.display = "flex";
        }
    })

    // Menu burger
    const menu = document.querySelector("LABEL");
    let i = 0;
    menu.addEventListener('click', function() {
        const menuUl = document.querySelector("UL");
        i = i + 1
        if (i % 2 == 1) {
            menuUl.classList.remove("close");
            menuUl.classList.add("open");
        } else {
            menuUl.classList.remove("open");
            menuUl.classList.add("closing");
            menuUl.classList.add("close");
            timer = setTimeout(function() {
                menuUl.classList.remove("closing");
            }, 600);
        }
    })
}

// Apparition des images au scroll
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

// Newsletter
const formNewsletter = document.querySelector('#newsletter');
const inputNewsletter = document.querySelector('#newsletter_email');
const pNewsResult = document.querySelector('#newsletter_result');

formNewsletter.addEventListener('submit', function(e) {
    e.preventDefault();
    ajaxNewsletter();
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
        return true;
    }
}

function ajaxNewsletter() {
    if (checkNewsletter()) {
        const data = new FormData(formNewsletter);

        fetch("php/news.php", { method: "POST", body: data })
            .then(response => response.json())
            .then((result) => {
                if (result.responseServer === true && result.responseDB === true) {
                    formNewsletter.reset();
                    pNewsResult.textContent = "Votre adresse email a été enregistrée.";
                    pNewsResult.classList.add("newsletter_p_valid");
                } else if (result.responseServer === true && result.responseDB === "23000") {
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