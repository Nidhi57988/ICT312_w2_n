// const mainImage = document.getElementById('product-main-image');
// const imageList = document.querySelectorAll('.image-list');

// imageList.forEach(image => {
//     image.addEventListener('click', function() {
//         // Update the main image src with the clicked image src
//         mainImage.src = this.getAttribute('data-image');
        
//         // Remove active class from all images
//         imageList.forEach(img => img.classList.remove('active'));
        
//         // Add active class to the clicked image
//         this.classList.add('active');
//     });
// });

const mainImage = document.getElementById('product-main-image');
const imageList = document.querySelectorAll('.image-list');
const colorOptions = document.querySelectorAll('.color-selection span');

// Function to update the main product image
function updateMainImage(newSrc) {
    mainImage.src = newSrc;
    imageList.forEach(img => img.classList.remove('active')); // Optionally remove active class if used
}

// Event listener for thumbnail clicks
imageList.forEach(image => {
    image.addEventListener('click', function() {
        updateMainImage(this.getAttribute('data-image'));
        this.classList.add('active');
    });
});

// Event listener for color options clicks
colorOptions.forEach(color => {
    color.addEventListener('click', function() {
        const imageFile = this.getAttribute('data-image');
        updateMainImage(imageFile);
    });
});