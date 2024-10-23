let currentIndex = 0;
const images = document.querySelectorAll('.container2 img');
const totalImages = images.length;

function showNextImage() {
    images[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % totalImages;
    images[currentIndex].classList.add('active');
}

// Show the first image initially
images[currentIndex].classList.add('active');

// Change image every 3 seconds
setInterval(showNextImage, 3000);


/* function changeImage(button, direction) {
    const sliderItem = button.closest('.room-slider-item');
    const images = sliderItem.querySelectorAll('.slider-image');
    let roomcurrentIndex = Array.from(images).findIndex(img => img.style.display === 'block');

    // Calculate the new index
    const newIndex = (roomcurrentIndex + direction + images.length) % images.length;

    // Hide the current image and show the new image
    images[roomcurrentIndex].style.display = 'none';
    images[newIndex].style.display = 'block';
}*/


