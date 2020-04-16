<?php
    const TOKEN = '999933605:AAFTTx0UhKuJ7tjIf9AB5NNVo3Bcx3EpVqc';

    $url1 = 'https://api.telegram.org/bot' . TOKEN . '/sendMessage';

    $params = [
        'chat_id' => 502220139,
        'text' => 'i bot'
    ];

    $url = $url1 . '?' . http_build_query($params);
    $response = json_decode(file_get_contents($url1), JSON_OBJECT_AS_ARRAY);

    var_dump($response);

?>