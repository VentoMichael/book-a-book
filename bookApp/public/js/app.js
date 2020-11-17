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
function focusSearch(){
    let formSearch = document.getElementById("formSearch");
    let inputCta = document.getElementById('inputCta')
    inputCta.addEventListener('click',()=>{
        formSearch.focus()
    })
}
function hideMessage() {
    var sM = document.getElementById("sucessMessage");
    setTimeout(function () {
        sM.style.background = 'transparent';
        sM.style.color = 'transparent';
        sM.style.transition = '.7s';
        sM.style.transitionDuration = 'opacity';
        sM.style.position = 'absolute';
        sM.style.top = '-9999px';
    }, 5000);
}
