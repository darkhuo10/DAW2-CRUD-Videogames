function goTo(url) {
    return function() {
        window.location.href = url;
    };
}

function notifyUser(text) {
    var toast = document.createElement("div");
    toast.className = "toast";
    toast.textContent = text;
    document.body.appendChild(toast);
    setTimeout(function () {
        document.body.removeChild(toast);
    }, 2000);
}