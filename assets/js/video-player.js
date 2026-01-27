document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('localVideo');
    const overlay = document.getElementById('playOverlay');

    if (!video || !overlay) return;

    overlay.addEventListener('click', function () {
        video.setAttribute('controls', 'controls');
        video.play();
        overlay.style.display = 'none';
    });

    video.addEventListener('pause', function () {
        overlay.style.display = 'block';
    });

    video.addEventListener('ended', function () {
        overlay.style.display = 'block';
    });
});
