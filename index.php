<?php
session_start();

// Lista de números de WhatsApp com pesos
$numeros = [
    "5583988619696" => 4,  // Cainã (40%)
    "5581985307047" => 3,  // Gabriel (30%)
    "5585991724788" => 2,  // Anderson (20%)
    "5534999224730" => 1   // Tarles (10%)
];

// Criar uma lista ponderada para escolha aleatória
$listaPonderada = [];
foreach ($numeros as $numero => $peso) {
    for ($i = 0; $i < $peso; $i++) {
        $listaPonderada[] = $numero;
    }
}

// Embaralhar para evitar padrões
shuffle($listaPonderada);

// Escolher um número aleatório da lista ponderada
$numeroEscolhido = $listaPonderada[array_rand($listaPonderada)];

// Mensagem para o WhatsApp
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Redirecionar para o WhatsApp com o número escolhido
header("Location: $url");
exit;
?>
