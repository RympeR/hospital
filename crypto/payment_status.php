<?php
    require_once('paykassa_sci.class.php'); // подключаем класс для работы с SCI


    $paykassa_merchant_id = 'your_merchant_id';
    $paykassa_merchant_password = 'your_merchant_password';

    $paykassa = new PayKassaSCI(
        $paykassa_merchant_id,      // идентификатор мерчанта
        $paykassa_merchant_password // пароль мерчанта
    );

    $res = $paykassa->sci_confirm_order();

    if ($res['error']) {        // $res['error'] - true если ошибка
        die($res['message']); 	// $res['message'] - текст сообщения об ошибке
        // действия в случае ошибки
    } else {
        // действия в случае успеха
        $id = $res["data"]["order_id"];        // уникальный числовой идентификатор платежа в вашей системе, пример: 150800
        $transaction = $res["data"]["transaction"]; // номер транзакции в системе paykassa: 96401
        $hash = $res["data"]["hash"];               // hash, пример: bde834a2f48143f733fcc9684e4ae0212b370d015cf6d3f769c9bc695ab078d1
        $currency = $res["data"]["currency"];       // валюта платежа, пример: DASH
        $system = $res["data"]["system"];           // система, пример: Dash
        $address = $res["data"]["address"];         // адрес криптовалютного кошелька, пример: Xybb9RNvdMx8vq7z24srfr1FQCAFbFGWLg

        $partial = $res["data"]["partial"];         // настройка приема недоплаты или переплаты, 'yes' - принимать, 'no' - не принимать
        $amount = (float)$res["data"]["amount"];    // сумма счета, пример: 1.0000000

        if ($partial === 'yes') {
            // сумма заявки может не совпадать с полученной суммой, если включен режим частичной оплаты
            // актуально только для криптовалют, по умолчанию 'no'
        }

        // ваш код... запись в базу

        echo $id.'|success'; // обязательно, для подтверждения зачисления платежа
    }
?>


