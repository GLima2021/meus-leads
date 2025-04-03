document.addEventListener("DOMContentLoaded", function () {
    const botao = document.getElementById("botaoRedirect");

    botao.addEventListener("click", function (event) {
        event.preventDefault(); // Evita o link direto para Cainã

        fetch("redirect.php")
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    window.location.href = data.url; // Redireciona para o WhatsApp correto
                }
            })
            .catch(error => console.error("Erro ao redirecionar:", error));
    });
});
