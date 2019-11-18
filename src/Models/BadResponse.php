<?php
namespace HamidAtyabi\OAuth2Client\Models;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class BadResponse implements \JsonSerializable{
    private $error;
    private $description;
    
    public function __construct($jsonResult = '') {
        if(!empty($jsonResult)){
            $jsonResult = json_decode($jsonResult, true);
            if(is_array($jsonResult)){
                $this->error = @$jsonResult['error'];
                $this->description = @$jsonResult['error_description'];
            }
        }else{
            $this->error = "Bad response";
            $this->description = $jsonResult;
        }
        
    }
    
    
    
    function getError() {
        return $this->error;
    }

    function getDescription() {
        return $this->description;
    }

    function setError($error) {
        $this->error = $error;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return [
            'badResponse' => [
                'error' => $this->error,
                'description' => $this->description
            ]
        ];
    }
}
