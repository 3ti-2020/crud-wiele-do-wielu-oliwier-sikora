  
const content = document.querySelector(".content");
const opis = document.querySelector(".description");
const info = document.querySelector(".info");
const price = document.querySelector(".cena");
const btnClose = document.querySelector(".close");
const close = document.querySelector(".close-info");

content.addEventListener('mouseenter', function(){
    opis.style.display = "block";
    opis.style.animation = "ani1 0.5s cubic-bezier(0.380, 0.585, 0.575, 1.000) both";
} );

content.addEventListener('mouseleave', function(){
    opis.style.display = "none";
} );

info.addEventListener("click", function(){
    close.style.animation = "ani2 1s cubic-bezier(0.263, 0.450, 0.460, 0.940) both";
    close.style.display = "flex";
    info.style.zIndex = "0";
    price.style.zIndex = "0";
});

btnClose.addEventListener("click", function(){
    close.style.display = "none";
    info.style.zIndex = "1";
    price.style.zIndex = "1";
});