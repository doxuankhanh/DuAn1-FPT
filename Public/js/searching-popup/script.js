const containerSearching = document.querySelector('.div-popup-searching');
const contentSearching = document.querySelector('.div-content-searching');
const searchBtn = document.querySelector('.search-btn');
const closeBtn = document.querySelector('.p-closeSearchBox');

searchBtn.addEventListener('click', (e) => {
    e.preventDefault();
    containerSearching.classList.toggle('show');
});


closeBtn.addEventListener('click', (e) => {
    containerSearching.classList.remove('show');
})