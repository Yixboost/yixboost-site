// no_image.js - Replaces broken image sources with a default image.

document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll("img");
    images.forEach(img => {
        img.addEventListener("error", function () {
            if (this.src !== 'assets/images/default-image.png') {
                this.src = 'assets/images/default-image.png';
            }
        });
    });
});
