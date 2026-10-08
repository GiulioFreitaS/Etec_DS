let slideIndex = 1;
showSlides(slideIndex);

// Função para avançar ou voltar slides manualmente
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Função principal que controla a exibição
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    
    // Se passar do último, volta ao primeiro
    if (n > slides.length) {slideIndex = 1}
    
    // Se voltar antes do primeiro, vai para o último
    if (n < 1) {slideIndex = slides.length}
    
    // Esconde todos os slides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    // Mostra apenas o slide atual
    slides[slideIndex-1].style.display = "block";
}

// Autoplay: Troca de slide automaticamente a cada 5 segundos
setInterval(() => {
    plusSlides(1);
}, 5000);