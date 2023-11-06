function start() {
    const bVCreate = document.getElementById("videojuegos-crear");
    bVCreate.addEventListener('click', goTo("VideojuegosCreate.php"))
}
window.onload = start;