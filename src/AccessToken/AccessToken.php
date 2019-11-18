<?php
namespace HamidAtyabi\OAuth2Client\AccessToken;
use HamidAtyabi\OAuth2Client\Entities\Token;
use HamidAtyabi\OAuth2Client\Provider\OAuth2Provider;
use \HamidAtyabi\OAuth2Client\Models\TokenInfoResponse;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */

class AccessToken extends OAuth2Provider {
    
    public function __construct($config) {
        parent::__construct($config);
        
        
    }
    /**
     * @param string $accessToken
     * 
     * @return TokenInfoResponse
     */
    public function validity($accessToken = ''){
        if(empty($accessToken)){
            $headers = apache_request_headers();
            if(isset($headers['Authorization'])){
                $accessToken = $headers['Authorization'];
            }
        }
        $this->filterToken($accessToken);
        $tokenInfo = $this->tokenInfo($accessToken);
	if($tokenInfo->getCode() == 200 && !empty($this->getConfig()->resourceId && !in_array(trim(strtoupper($this->getConfig()->resourceId)), $tokenInfo->getResult()->getResources())))
            return new \HamidAtyabi\OAuth2Client\Models\TokenInfoResponse(403, "Access denied");
        return $tokenInfo;
    }
    
    /**
     * @param string $username
     * @param string $password
     * 
     * @return Token
     */
    public function get($username, $password){
        return $this->login($username, $password);
    }
    
    

    
}
