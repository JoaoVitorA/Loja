<?php
include __DIR__.'/vendor/autoload.php';
use \App\Pix\Payload;
use Mpdf\QrCode\QrCode; 
use Mpdf\QrCode\Output;


$obPayload=(new Payload)->setPixKey('449.464.418.83')
                                ->setDescription('Pagamento do pedido 11321231')
                                ->setMerchanteName('Alex caje')
                                ->setMerchanteCity('Sao Paulo')
                                ->setAmount(1.00)
                                ->setTxid('Alex super');
                              
    $payloadQrCode = $obPayload->getPayload();
    $obQrCode = new QrCode($payloadQrCode);
    $image = (new Output\Png)->Output($obQrCode,800);
header('Content-type: image/png');

echo "$image";


