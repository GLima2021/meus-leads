<?php
// Lista de números com pesos de distribuição
$numeros = [
    "5581985307047" => 3,  // Gabriel (30%)
    "5583988619696" => 2,  // Cainã (40%)
    "5585991724788" => 2,  // Anderson (20%)
    "5534999224730" => 1   // Tarles (10%)
];

// Criar array ponderado
$listaPonderada = [];
foreach ($numeros as $numero => $peso) {
    for ($i = 0; $i < $peso; $i++) {
        $listaPonderada[] = $numero;
    }
}

// Embaralhar a lista para garantir distribuição correta
shuffle($listaPonderada);

// Escolher um número aleatório da lista ponderada
$numeroEscolhido = $listaPonderada[array_rand($listaPonderada)];

// Criar a URL do WhatsApp
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Retornar a URL para o JavaScript
echo json_encode(["url" => $url]);
