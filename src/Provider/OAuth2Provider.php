<?php

namespace HamidAtyabi\OAuth2Client\Provider;
use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\ClientException;
use \HamidAtyabi\OAuth2Client\Entities;
use HamidAtyabi\OAuth2Client\Models;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
abstract class OAuth2Provider{
    private $config;
    private $client;


    public function __construct($config) {
        $options = new \stdClass();
        $options->host = "127.0.0.1";
        $options->port = 80;
        $options->clientId = "client_id";
        $options->clientSecret = "client_secret";
        $options->resourceId = "";
        if(array_key_exists("oauth2_host", $config))
            $options->host = $config['oauth2_host'];
        if(array_key_exists("oauth2_port", $config))
            $options->port = $config['oauth2_port'];
        if(array_key_exists("oauth2_client_id", $config))
            $options->clientId = $config['oauth2_client_id'];
        if(array_key_exists("oauth2_client_secret", $config))
            $options->clientSecret = $config['oauth2_client_secret'];
        if(array_key_exists("oauth2_resource_id", $config))
            $options->resourceId = $config['oauth2_resource_id'];
        $this->config = $options;
    }
    
    protected function getConfig(){
        return $this->config;
    }
    private function getHost(){
        return sprintf("%s:%s", $this->config->host, $this->config->port);
    }
    
    protected function login($username, $password){
        $parameters = array(
            "username" => $username,
            "password" => $password,
            "grant_type" => "password"
        );
        try{
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->getHost(),
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode(sprintf("%s:%s", $this->config->clientId, $this->config->clientSecret))
                ]
            ]);
            $result = $this->client->request('POST', "/oauth/token", [
                'form_params' => $parameters
            ]);
            return new \HamidAtyabi\OAuth2Client\Models\TokenResponse(200, "Successfully", 
                    new \HamidAtyabi\OAuth2Client\Entities\Token($result->getBody()->getContents()));
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            $error = new \HamidAtyabi\OAuth2Client\Models\BadResponse($ex->getResponse()->getBody()->getContents());
            return new \HamidAtyabi\OAuth2Client\Models\TokenResponse($ex->getCode(), $error->getDescription());
            
        }
        return new \HamidAtyabi\OAuth2Client\Models\TokenResponse(404, "Endpoint not found");
    }
    
    protected function refreshToken($refreshToken){
        $parameters = array(
            "refresh_token" => $refreshToken,
            "grant_type" => "refresh_token"
        );
        try{
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->getHost(),
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode(sprintf("%s:%s", $this->config->clientId, $this->config->clientSecret))
                ]
            ]);
            $result = $this->client->request('POST', "/oauth/token", [
                'form_params' => $parameters
            ]);
            return new \HamidAtyabi\OAuth2Client\Models\TokenResponse(200, "Successfully", 
                    new \HamidAtyabi\OAuth2Client\Entities\Token($result->getBody()->getContents()));
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            $error = new \HamidAtyabi\OAuth2Client\Models\BadResponse($ex->getResponse()->getBody()->getContents());
            return new \HamidAtyabi\OAuth2Client\Models\TokenResponse($ex->getCode(), $error->getDescription());
        }
        
        return new \HamidAtyabi\OAuth2Client\Models\TokenResponse(404, "Endpoint not found");
    }
    
    
    protected function tokenInfo($accessToken){
        $parameters = array(
            "token" => $accessToken
        );
        try{
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->getHost(),
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode(sprintf("%s:%s", $this->config->clientId, $this->config->clientSecret))
                ]
            ]);
            $result = $this->client->request('POST', "/oauth/check_token", [
                'form_params' => $parameters
            ]);
            return new \HamidAtyabi\OAuth2Client\Models\TokenInfoResponse(200, "Successfully", 
                    new \HamidAtyabi\OAuth2Client\Entities\TokenInfo($result->getBody()->getContents()));
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            $error = new \HamidAtyabi\OAuth2Client\Models\BadResponse($ex->getResponse()->getBody()->getContents());
            return new \HamidAtyabi\OAuth2Client\Models\TokenInfoResponse($ex->getCode(), $error->getDescription());
        }
        
        return new \HamidAtyabi\OAuth2Client\Models\TokenInfoResponse(404, "Endpoint not found");
    }
    
    protected function userInfo($accessToken){
        try{
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->getHost(),
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken
                ]
            ]);
            $result = $this->client->request('GET', "/token_info");
            return new \HamidAtyabi\OAuth2Client\Models\Response(200, "Successfully", $result->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            $error = new \HamidAtyabi\OAuth2Client\Models\BadResponse($ex->getResponse()->getBody()->getContents());
            return new \HamidAtyabi\OAuth2Client\Models\Response($ex->getCode(), $error->getDescription());
        }
        
        return new \HamidAtyabi\OAuth2Client\Models\Response(404, "Endpoint not found");
    }
    
    
    protected function filterToken(&$accessToken){
        $matches = array();
        preg_match('/Bearer (.*)/', $accessToken, $matches);
        if(isset($matches[1])) $accessToken = $matches[1];
        return $accessToken;
    }
}
