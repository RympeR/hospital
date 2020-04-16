<?php

const TOKEN = '999933605:AAFTTx0UhKuJ7tjIf9AB5NNVo3Bcx3EpVqc';
$method = 'setWebhook';
$url = 'https://api.telegram.org/bot' . TOKEN . '/' . $method;
$options = [
    'url' => 'https://sevice3243.xyz/recieve.php',
];
$response = file_get_contents($url . '?' . http_build_query($options));
print_r($response);
?>
