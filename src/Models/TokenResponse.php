<?php
namespace HamidAtyabi\OAuth2Client\Models;
use HamidAtyabi\OAuth2Client\Entities\Token;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class TokenResponse implements \JsonSerializable{
    private $code;
    private $message;
    private $token;
    
    public function __construct($code, $message, Token $token = null) {
        $this->code = $code;
        $this->message = $message;
        $this->token = $token;
    }
    
    /**
     * check validity of access_token
     *
     * @return int
     */
    function getCode() {
        return $this->code;
    }

    /**
     * check validity of access_token
     *
     * @return string
     */
    function getMessage() {
        return $this->message;
    }

    /**
     * check validity of access_token
     *
     * @return Token
     */
    function getToken() {
        return $this->token;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setToken(Token $token) {
        $this->token = $token;
    }


    public function jsonSerialize()
    {
        return [
            'tokenResponse' => [
                'code' => $this->code,
                'message' => $this->message,
                'token' => $this->token
            ]
        ];
    }

}
