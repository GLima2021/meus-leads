document.addEventListener("DOMContentLoaded", function () {
    // Animação de Fade-In no botão
    const botao = document.querySelector(".botao");
    botao.style.opacity = "0";
    botao.style.transition = "opacity 1.5s ease-in-out";

    setTimeout(() => {
        botao.style.opacity = "2";
    }, 500);

    // Monitoramento de cliques no botão
    botao.addEventListener("click", function () {
        console.log("Usuário clicou no botão de 'Assista Agora'");
    });
});

