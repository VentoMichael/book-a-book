function stayOpenFunction() {
    let formSearch = document.getElementById("formSearch");
    formSearch.addEventListener('input', () => {
        if (formSearch.value !== '') {
            formSearch.classList.add('w-48', 'py-1', 'px-3')
        } else {
            formSearch.classList.remove('w-48', 'py-1', 'px-3')
        }
    })
}

    setTimeOut(function () {
        document.getElementById("sucessMessage").remove()
    }, 3000);

setInterval(function(){

    var obj = document.getElementById("sucessMessage");
    obj.innerHTML = "dezdezdze";

},3000);
