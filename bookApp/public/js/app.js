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

console.log(hideMessage)

function hideMessage() {
    console.log('dans')
    var sM = document.getElementById("sucessMessage");
    setTimeout(function () {
        sM.style.background = 'transparent';
        sM.style.color = 'transparent';
        sM.style.transition = '.7s';
        sM.style.transitionDuration = 'opacity';
        sM.style.position = 'absolute';
    }, 5000);
}
