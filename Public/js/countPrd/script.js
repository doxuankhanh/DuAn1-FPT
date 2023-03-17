const plusCount = document.querySelectorAll('.plus');
const subtractsCount = document.querySelectorAll('.subtracts');


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