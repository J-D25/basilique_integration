let checkbox = document.getElementById("menu_check");
checkbox.addEventListener('click', event => {
    var hook = document.getElementById("header_hook");

    if (document.getElementById('menu_check').checked) {
        hook.style.display = "none";
    } else {
        hook.style.display = "flex";
    }
})