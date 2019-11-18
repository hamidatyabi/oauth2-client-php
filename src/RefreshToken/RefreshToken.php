<?php
namespace HamidAtyabi\OAuth2Client\RefreshToken;
use HamidAtyabi\OAuth2Client\Provider\OAuth2Provider;
use \HamidAtyabi\OAuth2Client\Entities\Token;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class RefreshToken extends \HamidAtyabi\OAuth2Client\Provider\OAuth2Provider{
    
    public function __construct($config) {
        parent::__construct($config);
        
        
    }
    /**
     * @param string $refershToken
     * 
     * @return Token
     */
    public function refresh($refershToken = ''){
        return $this->refreshToken($refershToken);
    }
    
}
