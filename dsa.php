<?php
require __DIR__ .'/vendor/autoload.php';

use \App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;


 


$obPayload = (new Payload) -> setPixKey('4431232131231')
                                ->setDescription('Pagamento do pedido 11321231')
                                ->setMerchanteName('Alex caje')
                                ->setMerchanteCity('Sao Paulo')
                                ->setAmount(14.00)
                                ->setTxid('Alex super');
                              
    $payloadqrcode = $obPayload->getPayload();

    
    $obQrCode = new QrCode($payloadqrcode);

    $image = (new Output\Png)->output($obQrCode);
    
    header('Content-type: image/png');

    echo $image;


    