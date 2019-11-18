<?php
namespace HamidAtyabi\OAuth2Client\User;
use HamidAtyabi\OAuth2Client\Provider\OAuth2Provider;
use HamidAtyabi\OAuth2Client\Models\Response;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */

class User extends \HamidAtyabi\OAuth2Client\Provider\OAuth2Provider{
    public function __construct($config) {
        parent::__construct($config);
    }
    
    /**
     * @param string $accessToken
     * 
     * @return Response
     */
    public function get($accessToken){
        if(empty($accessToken)){
            $headers = apache_request_headers();
            if(isset($headers['Authorization'])){
                $accessToken = $headers['Authorization'];
            }
        }
        $this->filterToken($accessToken);
        $result = $this->userInfo($accessToken);
        return $result;
    }
}
