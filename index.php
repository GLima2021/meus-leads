<?php
// Definir os números e suas respectivas probabilidades (pesos)
$numeros = [
    "5581985307047" => 3,  // Gabriel (30%)
    "5583988619696" => 2,  // Cainã (40%)
    "5585991724788" => 2,  // Anderson (20%)
    "5534999224730" => 1   // Tarles (10%)
];

// Criar um array com base nos pesos
$listaPonderada = [];
foreach ($numeros as $numero => $peso) {
    for ($i = 0; $i < $peso; $i++) {
        $listaPonderada[] = $numero;
    }
}

// Embaralhar para garantir distribuição aleatória
shuffle($listaPonderada);

// Sortear um número aleatório da lista
$numeroEscolhido = $listaPonderada[array_rand($listaPonderada)];

// Mensagem que será enviada
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
