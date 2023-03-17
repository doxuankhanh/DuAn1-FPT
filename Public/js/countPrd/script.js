const plusCount = document.querySelectorAll('.plus');
const subtractsCount = document.querySelectorAll('.subtracts');
const plusCountPrd = document.querySelectorAll('.plus-cart');
const subtractsCountPrd = document.querySelectorAll('.subtracts-cart');


plusCount.forEach(function(ele){
    ele.addEventListener('click', function(e){
        e.preventDefault();
    }) 
})
subtractsCount.forEach(function(ele){
    ele.addEventListener('click', function(e){
        e.preventDefault();
    }) 
});
plusCountPrd.forEach(function(ele){
    ele.addEventListener('click', function(e){
        e.preventDefault();
    }) 
})
subtractsCountPrd.forEach(function(ele){
    ele.addEventListener('click', function(e){
        e.preventDefault();
    }) 
});