document.addEventListener('DOMContentLoaded', function() {

let images = document.querySelectorAll('.pleinEcran-photo');
let lightbox = document.querySelector('.lightbox');
let lightboxImg = document.querySelector('.lightbox__container img');
let lightboxTitle = document.querySelector('.lightbox__title');
let lightboxCategory = document.querySelector('.lightbox__category');
let prevBtn = document.querySelector('.lightbox__prev');
let nextBtn = document.querySelector('.lightbox__next');
let currentIndex = 0;

function showImage(index) {
    let image = images[index];
    if (image) {
        let imageUrl = image.getAttribute('data-image-url');
        let imageTitle = image.getAttribute('data-title');
        let imageCategory = image.getAttribute('data-category');
        lightboxImg.setAttribute('src', imageUrl);
        lightboxTitle.textContent = imageTitle;
        lightboxCategory.textContent = imageCategory;
        currentIndex = index;
    }
}

function showPrev() {
    currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
    showImage(currentIndex);
}

function showNext() {
    currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
    showImage(currentIndex);
}

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('pleinEcran-photo')) {
        images = document.querySelectorAll('.pleinEcran-photo'); // Mettre à jour la liste des images
        let index = Array.from(images).indexOf(event.target);
        showImage(index);
        lightbox.style.display = 'block';
    }

    if (event.target.classList.contains('lightbox__close')) {
        lightbox.style.display = 'none';
    }
});

prevBtn.addEventListener('click', showPrev);
nextBtn.addEventListener('click', showNext);

})