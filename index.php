<?php
session_start();

// Lista de números de WhatsApp balanceados
$numeros = [
    "5583988619696", // Cainã
    "5583988619696", // Cainã (80% de leads)
    "5581985307047", // Gabriel (20% de leads)
];


// Embaralhar a lista para evitar padrões previsíveis
shuffle($numeros);

// Controle de sessão para distribuir os leads ciclicamente
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} else {
    $_SESSION['contador'] = ($_SESSION['contador'] + 1) % count($numeros);
}

// Escolher o número atual
$numeroEscolhido = $numeros[$_SESSION['contador']];

// Mensagem que será enviada
$mensagem = urlencode("Fala Tayan, quero mais informações sobre o Minicurso 💰!");

// Criar o link do WhatsApp
$url = "https://api.whatsapp.com/send?phone=$numeroEscolhido&text=$mensagem";

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
