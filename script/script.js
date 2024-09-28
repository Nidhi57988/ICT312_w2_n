const slides = document.querySelectorAll('.hero-image');
let currentSlide = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

// Change slide every 3 seconds
setInterval(nextSlide, 3000); 
showSlide(currentSlide); // Initial call