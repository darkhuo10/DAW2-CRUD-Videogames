function start() {
    const bGames = document.getElementById("index-videojuegos");
    const bDev = document.getElementById("index-desarrolladores");
    const bGen = document.getElementById("index-generos");
    const bFav = document.getElementById("index-favoritos");

    bGames.addEventListener('click', goTo("VideojuegosIndex.php"));
    bDev.addEventListener('click', goTo("DesarrolladoresIndex.php"));
    bGen.addEventListener('click', goTo("GenerosIndex.php"));
    bFav.addEventListener('click', goTo("FavoritosIndex.php"));
}

window.onload = start;