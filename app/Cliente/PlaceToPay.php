<?php
namespace App\Cliente;
class PlaceToPay{
    private $tranKey;
    private $url;
    private $identificador;

    function __construct()
    {
        $this->tranKey = env("TRAN_KEY");
        $this->url = env("WS_URL");
        $this->identificador = env("IDENTIFICADOR");
    }

    public function getTranKey()
    {
        return $this->tranKey;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getIdentificador()
    {
        return $this->identificador;
    }

    public function getDate()
    {
        return date('c');
    }

    public function getHash($seed)
    {
        return sha1($seed . $this->getTranKey(), false);
    }
    
    public function getBankList()
    {
        $seed = $this->getDate();
        $hash = $this->getHash($seed);
        $client = new \SoapClient($this->getUrl(), array('wsdl'=>true,"trace"=>true)); 
        return $client->getBankList( 
                array(
                    "auth"=>array(
                        "login"=>$this->getIdentificador(),
                        "tranKey"=>$hash,
                        "seed"=>$seed,
                        "additional"=>[]
                    )
                )
        );
    }

    public function createTransaction($bankCode,$persona)
    {
        
        $PSETransactionRequest = array(
            "bankCode"=>$bankCode,
            "bankInterface"=>"0",
            "returnURL"=>"http://localhost:8080/placePay/public/responsePSE",
            "reference"=>"0000001",
            "description"=>"Pago de Prueba",
            "language"=>"ES",
            "currency"=>"COP",
            "totalAmount"=>5000,
            "taxAmount"=>0,
            "devolutionBase"=>0,
            "tipAmount"=>0,
            "payer"=>$persona,
            "buyer"=>$persona,
            "shipping"=>$persona,
            "ipAddress"=>(isset($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:"127.0.0.1",
            "userAgent"=>(isset($_SERVER['HTTP_USER_AGENT']))?$_SERVER['HTTP_USER_AGENT']:"Test",
            "additionalData"=>[]
        );

        $seed = $this->getDate();
        $hash = $this->getHash($seed);

        $auth = array(
            "login"=>$this->getIdentificador(),
            "tranKey"=>$hash,
            "seed"=>$seed,
            "additional"=>[]
        );

        $client = new \SoapClient($this->getUrl(), array('wsdl'=>true,"trace"=>true)); 
        return $client->createTransaction( 
                            array(
                                "auth"=>$auth,
                                "transaction"=>$PSETransactionRequest
                            )
                    );
    }
}
