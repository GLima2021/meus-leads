<?php
session_start();

// Definir os números e suas respectivas probabilidades (pesos)
// Certifique-se de não duplicar as chaves se não for a intenção
$numeros = [
    "5583988619696" => 4,  // Cainã (50%)
    "5581985307047" => 3,  // Gabriel (20%)
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

// Aqui, utilize o número escolhido dinamicamente na URL:
$url = "https://api.whatsapp.com/send?phone=" . $numeroEscolhido . "&text=" . $mensagem;

// Redirecionar para o link do WhatsApp
header("Location: $url");
exit;
?>
