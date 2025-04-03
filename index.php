<?php
session_start();

// Definir os números e suas respectivas probabilidades (pesos)
$numeros = [
    "5583988619696" => 4,  // Cainã (50%)
    "5581985307047" => 3,  // Gabriel (20%)
    "5585991724788" => 2,  // Anderson (20%)
    "5534999224730" => 1   // Tarles (10%)
    "5581985307047" => 3,  // Gabriel (20%)
    "5583988619696" => 4,  // Cainã (50%)
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

// Embaralhar a lista para evitar padrões previsíveis
shuffle($listaPonderada);


// Escolher um número aleatório da lista ponderada
$numeroEscolhido = $listaPonderada[array_rand($listaPonderada)];


// Escolher o número atual
$numeroEscolhido = $listaPonderada[$_SESSION['contador']];

// Mensagem que será enviada
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=5583988619696&text=Fala%20Tayan,%20quero%20mais%20informa%C3%A7%C3%B5es%20sobre%20o%20Minicurso%20💰!";

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
