<?php
namespace HamidAtyabi\OAuth2Client\Entities;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class Token{
    private $accessToken;
    private $tokenType;
    private $refreshToken;
    private $expiresIn;
    private $scope;
    private $userId;
    
    function __construct($data = '') {
        if(!empty($data)){
            $jsonResult = json_decode($data, true);
            if(is_array($jsonResult)){
                $this->accessToken = @$jsonResult['access_token'];
                $this->tokenType = @$jsonResult['token_type'];
                $this->refreshToken = @$jsonResult['refresh_token'];
                $this->expiresIn = @$jsonResult['expires_in'];
                $this->scope = @$jsonResult['scope'];
                $this->userId = @$jsonResult['userId'];
            }
        }
    }
    
    function getAccessToken() {
        return $this->accessToken;
    }

    function getTokenType() {
        return $this->tokenType;
    }

    function getRefreshToken() {
        return $this->refreshToken;
    }

    function getExpiresIn() {
        return $this->expiresIn;
    }

    function getScope() {
        return $this->scope;
    }

    function getUserId() {
        return $this->userId;
    }

    function setAccessToken($accessToken) {
        $this->accessToken = $accessToken;
    }

    function setTokenType($tokenType) {
        $this->tokenType = $tokenType;
    }

    function setRefreshToken($refreshToken) {
        $this->refreshToken = $refreshToken;
    }

    function setExpiresIn($expiresIn) {
        $this->expiresIn = $expiresIn;
    }

    function setScope($scope) {
        $this->scope = $scope;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }





}
