 const btnMobile = document.getElementById('btnMobile');
 const menu = document.getElementById('navM');
 

btnMobile.addEventListener('click', () => {
    menu.classList.toggle('active');
    
});

    
window.efeito = ScrollReveal({reset: true});
efeito.reveal('.home',{duration:1000});



efeito.reveal('.mainSobre',{ easing: 'ease-in' });


const btnDark = document.getElementById('darkmode');
const body = document.getElementById('corpo');

btnDark.addEventListener('click', () =>{
    if (btnDark.classList.contains('fa-sun')){
        btnDark.classList.remove('fa-sun')
        btnDark.classList.add('fa-moon')
        body.classList.add('mode')
    }else{
        btnDark.classList.remove('fa-moon')
        btnDark.classList.add('fa-sun')
        body.classList.remove('mode')
    }


});


