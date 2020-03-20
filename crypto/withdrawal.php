<!-- Выплата -->
<?php
    require_once('paykassa_api.class.php'); // подключаем класс для работы с API, скачать можно по ссылке

    $paykassa_api_id = 'your_api_id';
    $paykassa_api_password = 'your_api_password';
    $paykassa_merchant_id = 'your_merchant_id';

    $amount = 0.25;
    $system = "bitcoin";
    $currency = 'BTC';
    $wallet = '3D2oetdNuZUqQHPJmcMDDHYoqkyNVsFk9r';
    $comment = 'comment';
    $paid_commission = '';
    $tag = '';
    $real_fee = true; // поддерживаются - BTC, LTC, DOGE, DASH, BSV, BCH, ZEC
    $priority = "high"; // low - медленно, medium - средне, high - быстро

    $paykassa = new PayKassaAPI(
        $paykassa_api_id,       // идентификатор api
        $paykassa_api_password 	// пароль api
    );


    $system_id = [
        "payeer" => 1, // поддерживаемые валюты RUB, USD    
        "advcash" => 4, // поддерживаемые валюты RUB, USD    
        "perfectmoney" => 2, // поддерживаемые валюты USD    
        "berty" => 7, // поддерживаемые валюты RUB, USD    
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

    $res = $paykassa->api_payment(
        $paykassa_merchant_id,  // обязательный параметр, id мерчанта с которого нужно сделать выплату
        $system_id[$system],    // обязательный параметр, id платежного метода
        $wallet,                // обязательный параметр, номер кошелька на который отправляем деньги
        (float)$amount,         // обязательный параметр, сумма платежа, сколько отправить
        $currency,              // обязательный параметр, валюта платежа
        $comment,               // обязательный параметр, комментарий к платежу, можно передать пустой
        $paid_commission,       // необязательный параметр, кто оплачивает комиссию за перевод, shop или client
        $tag,                   // необязательный параметр, тег для выплаты, можно передать пустой
        $real_fee,              // необязательный параметр(по умолчанию false), включает режим фактического списания комиссии взятой сетью
        $priority               // необязательный параметр(по умолчанию medium), используется для задания
                                // приоритета включения в блок вместе с $real_fee === true
    );

    if ($res['error']) {        // $res['error'] - true если ошибка
        echo $res['message'];   // $res['message'] - текст сообщения об ошибке
        //действия в случае ошибки
    } else {
        //действия в случае успеха
        $shop_id = $res['data']['shop_id'];                         // id мерчанта, с которого была сделана выплата, пример 122
        $transaction = $res['data']['transaction'];                 // номер транзакции платежа, пример 130236
        $txid = $res['data']['txid'];                               // txid 70d6dc6841782c6efd8deac4b44d9cc3338fda7af38043dd47d7cbad7e84d5dd
        $amount = $res['data']['amount'];                           // сумма выплаты, сколько списалось с баланса мерчанта, 0.42
        $amount_pay = $res['data']['amount_pay'];                   // сумма выплаты, столько пришло пользователю, пример: 0.41
        $system = $res['data']['system'];                           // система выплаты, куда была сделана выплата, пример: Bitcoin
        $currency = $res['data']['currency'];                       // валюта выплаты, пример: BTC
        $number = $res['data']['number'];                           // номер адреса куда были отправлены средства
        $comission_percent = $res['data']['shop_comission_percent'];// комиссия за перевод в процентах, пример: 1.5
        $comission_amount = $res['data']['shop_comission_amount'];  // комиссия за перевод сумма, пример: 1.00
        $paid_commission = $res['data']['paid_commission'];         // кто оплачивал комиссию, пример: shop
		
		// ваш код... запись в базу
		
    }
?>
<!-- /.Выплата -->