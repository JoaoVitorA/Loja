<?php 

namespace App\Pix;

class Payload{
       /**
   * IDs do Payload do Pix
   * @var string
   */
    const ID_PAYLOAD_FORMAT_INDICATOR = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION = '26';
    const ID_MERCHANT_ACCOUNT_INFORMATION_GUI = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION_KEY = '01';
    const ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION = '02';
    const ID_MERCHANT_CATEGORY_CODE = '52';
    const ID_TRANSACTION_CURRENCY = '53';
    const ID_TRANSACTION_AMOUNT = '54';
    const ID_COUNTRY_CODE = '58';
    const ID_MERCHANT_NAME = '59';
    const ID_MERCHANT_CITY = '60';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE = '62';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID = '05';
    const ID_CRC16 = '63';

        /**
   * Chave do pix
   * @var string
   */
  private $pixKey;

  /**
 * Chave do descipttiondo pag
 * @var string
 */
private $description;


  /**
 * Chave do pix
 * @var string
 */
private $merchanteName;

  /**
 * Chave do pix
 * @var string
 */
private $merchanteCity;

  /**
 * Chave do pix
 * @var string
 */
private $txid;

  /**
 * Chave do pix
 * @var string
 */
private $amount;

    /**
 * 
 * @param string $pixKey
 */
public function setPixKey($pixKey){
  $this->pixKey = $pixKey;
  return $this;
}
/**
 * 
 * @param string $description;
 */
public function setDescription($description){
  $this->description = $description;
  return $this;
}

/**
 * 
 * @param string $merchanteName
 */
public function setMerchanteName($merchanteName){
  $this->merchanteName = $merchanteName;
  return $this;
}

/**
 * 
 * @param string $merchanteCity
 */
public function setMerchanteCity($merchanteCity){
  $this->merchanteCity = $merchanteCity;
  return $this;
}

/**
 * 
 * @param string $txid
 */
public function setTxid($txid){
  $this->txid= $txid;
  return $this;
}

/**
 * 
 * @param string $merchantCity
 */
public function setAmount($amount){
  $this->amount=(string) number_format($amount,2,'.','');
  return $this;
}

/**
 * @param string $id
 * @param string $value
 * @param string $id.$size.$value
 */
private function getValue($id,$value){
$size = str_pad(strlen($value),2,'0', STR_PAD_LEFT);

return $id.$size.$value;
}

    /** 
 * @return string
 */
private function getMerchanteAccountInformation(){
  $gui = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION,'br.gov.bcb.pix');
//CHAVE PIX
  $key= $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_KEY,$this->pixKey);

  $description = strlen ($this->description) ? $this->getValue (self::ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION, $this -> description) : '';

  return $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION,$gui.$key.$description);


/**
 * @return string
 */
}
private function getAdditionaDataFieldTeamplate(){
  $txid = $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID,$this->txid);
  return $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE,$txid);
}



/**
 * @return string
 */
public function getPayload(){
  $payload = $this->getValue(self::ID_PAYLOAD_FORMAT_INDICATOR, '01').
  $this->getMerchanteAccountInformation().
  $this->getValue(self::ID_MERCHANT_CATEGORY_CODE,'0000').
  $this->getValue(self::ID_TRANSACTION_CURRENCY,'986').
  $this->getValue(self::ID_TRANSACTION_AMOUNT,$this->amount).
  $this->getValue(self::ID_COUNTRY_CODE,'BR').
  $this->getValue(self::ID_MERCHANT_NAME,$this->merchanteName).
  $this->getValue(self::ID_MERCHANT_CITY,$this->merchanteCity).
  $this->getAdditionaDataFieldTeamplate();
  
  
  return $payload.$this->getCRC16($payload); 
}

  /**
   * Método responsável por calcular o valor da hash de validação do código pix
   * @return string
   */
  private function getCRC16($payload) {
    //ADICIONA DADOS GERAIS NO PAYLOAD
    $payload .= self::ID_CRC16.'04';

    //DADOS DEFINIDOS PELO BACEN
    $polinomio = 0x1021;
    $resultado = 0xFFFF;

    //CHECKSUM
    if (($length = strlen($payload)) > 0) {
        for ($offset = 0; $offset < $length; $offset++) {
            $resultado ^= (ord($payload[$offset]) << 8);
            for ($bitwise = 0; $bitwise < 8; $bitwise++) {
                if (($resultado <<= 1) & 0x10000) $resultado ^= $polinomio;
                $resultado &= 0xFFFF;
            }
        }
    }

    //RETORNA CÓDIGO CRC16 DE 4 CARACTERES
    return self::ID_CRC16.'04'.strtoupper(dechex($resultado));
}


}