<?php
namespace HamidAtyabi\OAuth2Client\Entities;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class TokenInfo implements \JsonSerializable{
    private $userId;
    private $username;
    private $clientId;
    private $resources;
    private $authorities;
    private $scopes;
    private $active;
    private $expire;
    
    function __construct($data = '') {
        if(!empty($data)){
            $jsonResult = json_decode($data, true);
            if(is_array($jsonResult)){
                $this->userId = @$jsonResult['userId'];
                $this->username = @$jsonResult['user_name'];
                $this->clientId = @$jsonResult['client_id'];
                $this->resources = @$jsonResult['aud'];
                $this->authorities = @$jsonResult['authorities'];
                $this->scopes = @$jsonResult['scope'];
                $this->active = @$jsonResult['active'];
                $this->expire = @$jsonResult['exp'];
            }
        }
    }
    
    function getUserId() {
        return $this->userId;
    }

    function getUsername() {
        return $this->username;
    }

    function getClientId() {
        return $this->clientId;
    }

    function getResources() {
        return $this->resources;
    }

    function getAuthorities() {
        return $this->authorities;
    }

    function getScopes() {
        return $this->scopes;
    }

    function getActive() {
        return $this->active;
    }

    function getExpire() {
        return $this->expire;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    function setResources($resources) {
        $this->resources = $resources;
    }

    function setAuthorities($authorities) {
        $this->authorities = $authorities;
    }

    function setScopes($scopes) {
        $this->scopes = $scopes;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setExpire($expire) {
        $this->expire = $expire;
    }


    public function jsonSerialize()
    {
        return [
            'tokenInfo' => [
                'userId' => $this->userId,
                'username' => $this->username,
                'clientId' => $this->clientId,
                'resources' => $this->resources,
                'authorities' => $this->authorities,
                'scopes' => $this->scopes,
                'active' => $this->active,
                'expire' => $this->expire
            ]
        ];
    }
}
