// const slides = document.querySelectorAll('.hero-image');
// let currentSlide = 0;

// function showSlide(index) {
//     slides.forEach((slide, i) => {
//         slide.classList.remove('active');
//         if (i === index) {
//             slide.classList.add('active');
//         }
//     });
// }

// function nextSlide() {
//     currentSlide = (currentSlide + 1) % slides.length;
//     showSlide(currentSlide);
// }

// // Change slide every 3 seconds
// setInterval(nextSlide, 3000); 
// showSlide(currentSlide); // Initial call


// Slideshow functionality
let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Hide all slides
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 } // Reset to first slide
    slides[slideIndex - 1].style.display = "block"; // Show the current slide
    setTimeout(showSlides, 5000); // Change slide every 5 seconds
}

// Function for navigating through slides
function plusSlides(n) {
    slideIndex += n;
    const slides = document.getElementsByClassName("mySlides");
    if (slideIndex > slides.length) { slideIndex = 1 }
    if (slideIndex < 1) { slideIndex = slides.length }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Hide all slides
    }
    slides[slideIndex - 1].style.display = "block"; // Show the current slide
}

// Search bar toggle functionality
document.getElementById('search-icon').addEventListener('click', function() {
    const searchBar = document.getElementById('search-bar');
    searchBar.classList.toggle('active'); // Toggle the active class
});