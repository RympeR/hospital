<?php
    const TOKEN = '999933605:AAFTTx0UhKuJ7tjIf9AB5NNVo3Bcx3EpVqc';

    $url1 = 'https://api.telegram.org/bot' . TOKEN . '/getMe';
    $url2 = 'https://api.telegram.org/bot' . TOKEN . '/getUpdates';
    
    
    $last_update = 800561225;

    $params = array(
        'offset' => $last_update
    );
    $url = $url2 . '?' . http_build_query($params);
    $response = json_decode(file_get_contents($url2), JSON_OBJECT_AS_ARRAY);

    var_dump($response);
    ?>