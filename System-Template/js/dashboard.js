let alterna = document.querySelector('.alterna');
let navegacao = document.querySelector('.navegacao');
let main = document.querySelector('.main')

alterna.onclick = function(){
    navegacao.classList.toggle('active');
    main.classList.toggle('active');
}

