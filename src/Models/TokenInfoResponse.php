<?php
namespace HamidAtyabi\OAuth2Client\Models;
use HamidAtyabi\OAuth2Client\Entities\TokenInfo;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class TokenInfoResponse implements \JsonSerializable{
    private $code;
    private $message;
    private $result;
    
    public function __construct($code, $message, TokenInfo $result = null) {
        $this->code = $code;
        $this->message = $message;
        $this->result = $result;
    }
    
    /**
     * 
     * @return int
     */
    function getCode() {
        return $this->code;
    }

    /**
     *
     * @return string
     */
    function getMessage() {
        return $this->message;
    }

    /**
     * 
     * @return TokenInfo
     */
    function getResult() {
        return $this->result;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setResult(TokenInfo $result) {
        $this->result = $result;
    }

    public function jsonSerialize()
    {
        return [
            'tokenInfoResponse' => [
                'code' => $this->code,
                'message' => $this->message,
                'result' => $this->result
            ]
        ];
    }


}
