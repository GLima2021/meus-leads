<?php
session_start();

// Definir os números e suas respectivas probabilidades (pesos)
$numeros = [
    "5583988619696" => 4,  // Cainã (40%)
    "5581985307047" => 3,  // Gabriel (30%)
    "5585991724788" => 2,  // Anderson (20%)
    "5534999224730" => 1   // Tarles (10%)
];

// Calcular a soma total dos pesos
$somaPesos = array_sum($numeros);

// Gerar um número aleatório entre 1 e a soma dos pesos
$rand = mt_rand(1, $somaPesos);

$numeroEscolhido = null;
$acumulado = 0;

// Percorrer os números e escolher baseado no peso
foreach ($numeros as $numero => $peso) {
    $acumulado += $peso;
    if ($rand <= $acumulado) {
        $numeroEscolhido = $numero;
        break;
    }
}

// Mensagem que será enviada
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
