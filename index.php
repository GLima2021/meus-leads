<?php
session_start();

// Definir os números e suas respectivas probabilidades (pesos)
$numeros = [
    "5583988619696" => 50,  // Cainã (50%)
    "5581985307047" => 20,  // Gabriel (20%)
    "5585991724788" => 20,  // Anderson (20%)
    "5534999224730" => 10   // Tarles (10%)
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

// Controle de sessão para distribuir os leads ciclicamente
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} else {
    $_SESSION['contador'] = ($_SESSION['contador'] + 1) % count($listaPonderada);
}

// Escolher o número atual
$numeroEscolhido = $listaPonderada[$_SESSION['contador']];

// Mensagem que será enviada
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
