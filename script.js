// Funktion, die das Türchen öffnet und den Inhalt anzeigt
function toggleDoor(doorNumber) {
    var door = document.getElementById('door-' + doorNumber);
    var content = document.getElementById('content-' + doorNumber);

    // Wenn das Türchen noch geschlossen ist
    if (content.style.display === "none") {
        // Türchen aufschwingen und öffnen
        door.classList.add('open');
        content.style.display = "block";
        door.style.animation = "swing 0.5s ease"; // Türchen schwingt auf
    } else {
        // Türchen wieder schließen
        door.classList.remove('open');
        content.style.display = "none";
    }
}

// Event-Listener für das Schließen der Videos, wenn man es schließt
document.addEventListener('DOMContentLoaded', function () {
    var iframes = document.querySelectorAll('iframe');
    iframes.forEach(function (iframe) {
        iframe.addEventListener('click', function () {
            var iframeSrc = iframe.src;
            iframe.src = iframeSrc + "?autoplay=1"; // Video starten
        });
    });
});
