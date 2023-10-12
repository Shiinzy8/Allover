document.addEventListener("DOMContentLoaded", function(event) { 
    var specific = document.querySelector(".specific");
    var hidden = document.querySelector(".hidden");

    specific.addEventListener("mouseover", function onMouseOver() {
        hidden.style.display = 'block';
    });

    hidden.addEventListener("click",
    function () {
        hidden.setAttribute("title", "Copied");
        navigator.clipboard.writeText(specific.innerText);
    });
});
