<?php
namespace HamidAtyabi\OAuth2Client\Models;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class Response{
    private $code;
    private $message;
    private $result;
    
    public function __construct($code, $message, $result = null) {
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
     * @return string
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

    function setResult($result) {
        $this->result = $result;
    }




}
