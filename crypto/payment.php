		
<!-- Выставление счета на оплату, получение адреса для оплаты -->
<?php
    require_once('paykassa_sci.class.php'); //подключаем класс для работы с SCI

    $paykassa_merchant_id = 'your_merchant_id';                 // идентификатор мерчанта
    $paykassa_merchant_password = 'your_merchant_password';     // пароль мерчанта

    $amount = 0.350;
    $system = 'bitcoin';
    $currency = 'BTC';
    $order_id = 'user_377'; // идентификатор юзера (ID, Login)
    $comment = 'comment';

    $paykassa = new PayKassaSCI(
        $paykassa_merchant_id,
        $paykassa_merchant_password
    );

    $system_id = [
        "bitcoin" => 11, // поддерживаемые валюты BTC    
        "ethereum" => 12, // поддерживаемые валюты ETH    
        "litecoin" => 14, // поддерживаемые валюты LTC    
        "dogecoin" => 15, // поддерживаемые валюты DOGE    
        "dash" => 16, // поддерживаемые валюты DASH    
        "bitcoincash" => 18, // поддерживаемые валюты BCH    
        "zcash" => 19, // поддерживаемые валюты ZEC    
        "ethereumclassic" => 21, // поддерживаемые валюты ETC    
        "ripple" => 22, // поддерживаемые валюты XRP    
        "tron" => 27, // поддерживаемые валюты TRX    
        "stellar" => 28, // поддерживаемые валюты XLM    
    ];

    $res = $paykassa->sci_create_order_get_data(
        $amount,    // обязательный параметр, сумма платежа, пример: 1.0433
        $currency,  // обязательный параметр, валюта, пример: BTC
        $order_id,  // обязательный параметр, уникальный числовой идентификатор платежа в вашей системе, пример: 150800
        $comment,   // обязательный параметр, текстовый комментарий платежа, пример: Заказ услуги #150800
        $system_id[$system] // обязательный параметр, пример: 12 - Ethereum
    );

    if ($res['error']) {        // $res['error'] - true если ошибка
        echo $res['message'];   // $res['message'] - текст сообщения об ошибке
        // действия в случае ошибки
    } else {
        $invoice = $res['data']['invoice'];     // Номер операции в системе Paykassa.pro
        $order_id = $res['data']['order_id'];   // Ордер в мерчанте
        $wallet = $res['data']['wallet'];       // Адрес для оплаты
        $amount = $res['data']['amount'];       // Сумма к оплате, может измениться, если комиссия переведена на клинета
        $system = $res['data']['system'];       // Система, в которой выставлен счет
        $url = $res['data']['url'];             // Ссылка для перехода на оплату
        $tag = $res['data']['tag'];             // Тег, указать при переводе для ripple

        if (!empty($tag)) {
            echo 'Send '.$amount.' '.$currency.' to this address '.$wallet.'. Tag: '.$tag.'. Balance will be updated automatically.';
        } else {
            echo 'Send '.$amount.' '.$currency.' to this address '.$wallet.'. Balance will be updated automatically.';
        }
        
    }
?>
<!-- /.Выставление счета на оплату, получение адреса для оплаты -->



