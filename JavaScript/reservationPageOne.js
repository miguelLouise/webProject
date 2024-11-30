let slideIndex = [0, 0, 0, 0]; // Stores the current index for each slider
let slideIds = ['slider1', 'slider2', 'slider3', 'slider4']; // Corresponding slider IDs

function moveSlide(n, sliderNum) {
    let slider = document.getElementById(slideIds[sliderNum]);
    let slides = slider.getElementsByClassName("slide");
    slideIndex[sliderNum] += n;

    if (slideIndex[sliderNum] >= slides.length) {
        slideIndex[sliderNum] = 0; // Wrap back to the first slide
    }

    if (slideIndex[sliderNum] < 0) {
        slideIndex[sliderNum] = slides.length - 1; // Wrap to the last slide
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Hide all slides
    }

    slides[slideIndex[sliderNum]].style.display = "block"; // Show the current slide
}

// Initialize the sliders by showing the first slide of each
for (let i = 0; i < slideIds.length; i++) {
    moveSlide(0, i); // Show the first slide of each slider
}