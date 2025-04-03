<script>
document.addEventListener("DOMContentLoaded", function () {
    // Lista de números com seus respectivos pesos
    const numerosComPesos = [
        { numero: "5583988619696", peso: 4 }, // Cainã
        { numero: "5581985307047", peso: 3 }, // Gabriel
        { numero: "5585991724788", peso: 2 }, // Anderson
        { numero: "5534999224730", peso: 1 }  // Tarles
    ];

    // Criar lista ponderada
    const listaPonderada = [];
    numerosComPesos.forEach(item => {
        for (let i = 0; i < item.peso; i++) {
            listaPonderada.push(item.numero);
        }
    });

    // Embaralhar a lista
    function embaralhar(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    embaralhar(listaPonderada);

    // Sorteia um número da lista embaralhada
    const numeroEscolhido = listaPonderada[Math.floor(Math.random() * listaPonderada.length)];

    // Monta a URL do WhatsApp
    const mensagem = encodeURIComponent("Fala Tayan, quero mais informações sobre o Minicurso 💰!");
    const url = `https://api.whatsapp.com/send?phone=${numeroEscolhido}&text=${mensagem}`;

    // Redireciona automaticamente
    window.location.href = url;
});
</script>
