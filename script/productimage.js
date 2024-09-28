const mainImage = document.getElementById('product-main-image');
const imageList = document.querySelectorAll('.image-list');

imageList.forEach(image => {
    image.addEventListener('click', function() {
        // Update the main image src with the clicked image src
        mainImage.src = this.getAttribute('data-image');
        
        // Remove active class from all images
        imageList.forEach(img => img.classList.remove('active'));

        // Add active class to the clicked image
        this.classList.add('active');
    });
});
