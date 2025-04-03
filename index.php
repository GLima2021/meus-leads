<?php
session_start();

// Definir os números e suas respectivas probabilidades (pesos)
$numeros = [
    "5583988619696" => 4,  // Cainã (40%)
    "5581985307047" => 3,  // Gabriel (30%)
    "5585991724788" => 2,  // Anderson (20%)
    "5534999224730" => 1   // Tarles (10%)
];

// Criar uma lista ponderada para sorteio justo
$listaPonderada = [];
foreach ($numeros as $numero => $peso) {
    for ($i = 0; $i < $peso; $i++) {
        $listaPonderada[] = $numero;
    }
}

// Embaralhar a lista para garantir aleatoriedade
shuffle($listaPonderada);

// Selecionar um número aleatório a cada requisição
$numeroEscolhido = $listaPonderada[array_rand($listaPonderada)];

// Mensagem que será enviada
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
