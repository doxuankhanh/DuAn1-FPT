const popupContainer = document.querySelector('.div-cart-popup-container');
const contentPopup = document.querySelectorAll('.a-price');
const cartIcon = document.querySelector('.cart')
const closeCartIcon = document.querySelector('.closeBtn')
contentPopup.forEach(item => {
<<<<<<< HEAD
    
=======
>>>>>>> d300864657d47590381928e820fdeacb3da84a92
    item.addEventListener('click', () => {
        item.preventDefault();
        popupContainer.classList.toggle('show');
    });
})

cartIcon.addEventListener('click', () => {
    popupContainer.classList.toggle('show');
});

closeCartIcon.addEventListener('click', () => {
    popupContainer.classList.toggle('show');
})


