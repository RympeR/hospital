<?php
    const TOKEN = '999933605:AAFTTx0UhKuJ7tjIf9AB5NNVo3Bcx3EpVqc';

    const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

    function sendRequest($method, $params=[]){
        if(!empty($params)){
            $url = BASE_URL . $method.'?'. http_build_query($params);
        } else {
            $url = BASE_URL . $method;
        }
        return json_decode(
                file_get_contents($url), 
                JSON_OBJECT_AS_ARRAY);
    }

    $update = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);

    $time = date('H:m:s');
    $chat_id = $update['message']['chat']['id'];
    sendRequest('sendMessage',['chat_id' => $chat_id, 'text' => $time]);
    ?>