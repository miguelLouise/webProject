function openFullscreen(roomId) {
    const fullscreenContainer = document.getElementById('fullscreen-view');
    const fullscreenImages = document.getElementById('fullscreen-images');
    fullscreenImages.innerHTML = '';

    const images = document.querySelectorAll(`#${roomId} .room-images .image-card img`);
    images.forEach(img => {
        const clone = img.cloneNode();
        fullscreenImages.appendChild(clone);
    });

    fullscreenContainer.style.display = 'flex';
}

function closeFullscreen() {
    document.getElementById('fullscreen-view').style.display = 'none';
}