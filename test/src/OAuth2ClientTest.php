<?php
namespace HamidAtyabi\OAuth2Client\Test;
use HamidAtyabi\OAuth2Client;
use HamidAtyabi\OAuth2Client\Entities\Response;
use PHPUnit\Framework\TestCase;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class OAuth2ClientTest extends TestCase
{
    private $config;
    public function __construct($name = null, $data = array(), $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->config = array(
            "oauth2_host" => "localhost",
            "oauth2_port" => "5061",
            "oauth2_client_id" => "client",
            "oauth2_client_secret" => "123456"
        );
        
    }
    public function testLogin()
    {
        $client = new \HamidAtyabi\OAuth2Client\AccessToken\AccessToken($this->config);
        $result = $client->get("admin", "123456");
        print_r($result);
        $this->assertNotNull($result);
        
    }
    public function testAccessTokenValidity()
    {
        $client = new \HamidAtyabi\OAuth2Client\AccessToken\AccessToken($this->config);
        $result = $client->validity("eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsiQVVUSEVOVElDQVRJT04iXSwidXNlcl9uYW1lIjoiYWRtaW4iLCJzY29wZSI6WyJyZWFkIiwid3JpdGUiXSwiZXhwIjoxNTc0MDAyNzQ4LCJ1c2VySWQiOjEsImF1dGhvcml0aWVzIjpbIlJPTEVfU1VQRVJfQURNSU4iXSwianRpIjoiMmIxNjkyZjQtOWY2MS00Y2RkLWJlMzktYjU1YjI0NDUzYjczIiwiY2xpZW50X2lkIjoiY2xpZW50In0.a0RxVSwCRRd0AMu4si1n7OR2Cp6z1--2xDWHM1T_eVWtpALmliiXavOjclKAN08E1tgTR_1wmTtMW4K4Di2fV9tr90Ti5oj0XrBeyebkD2IE3tZIZLHUtUZtQNJFSCxpR68TMHzuSO9JT0Oyo8HedqwSSbUbqKxAvjnoZIUcMzyoosGakpAVsblcKPpZ4iJ43rwz-e-TrsPpyDMPkunpYUULbnhNRf3E_sdQa0OyYa6Fqwo61ApHxQ6f_Ogza7NUZ08vVA9wljkOJ8DF49b9aq_FZ9lt6WVkLhM7CvnCbj4od7QqDuUOSkHVx9WgcwDVSvkCYK4Mlw6rM_t_RLXISQ");
        print_r($result);
        $this->assertNotNull($result);
        
    }
    public function testRefreshTokenRefresh()
    {
        $client = new \HamidAtyabi\OAuth2Client\RefreshToken\RefreshToken($this->config);
        $result = $client->refresh("eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsiQVVUSEVOVElDQVRJT04iXSwidXNlcl9uYW1lIjoiYWRtaW4iLCJzY29wZSI6WyJyZWFkIiwid3JpdGUiXSwiYXRpIjoiNTc3NDdkODAtZTAwYi00MGI5LWFjMTAtYmY2YWM5OGFkZDRhIiwiZXhwIjoxNTc0MDA2MzA4LCJ1c2VySWQiOjEsImF1dGhvcml0aWVzIjpbIlJPTEVfU1VQRVJfQURNSU4iXSwianRpIjoiMTkzNzM1NzUtYWI0NC00ZTM1LWFkMjUtMDlhNzA3YWE0MmFiIiwiY2xpZW50X2lkIjoiY2xpZW50In0.idHdVSDnGL3-2Lp340bLjVgaqvvKL0tAbRHmoh02vGzorLnDa_CgIangj_TW5MtSehqO6DjRsOwt_U3Pxz4JgRBfipP5D7Tz0d7OX_cZb15CAkYZmiCvUlOSrJYcOK_6dpZfVg376zz5iwULLSY7Jo7bnWFtUOFZyYSYzcu4IdvPrAhkt5Zx4L-0BSm6CeZU2Q6XwGoMptIjjXnOLvryUFzXb722lFupCT75QhFNEu8hFfMT4_W_cSdCTwFRoijf2_5GVCozcQfU7QmvHBwfH3pmQ_JwItPJAMGBZz6d1--GZnfLfQqn9dzfh0UWmDj6aG0uNrfXjBDFyVtiKXn3hQ");
        print_r($result);
        $this->assertNotNull($result);
        
    }
    public function testGetUserInfo()
    {
        $client = new \HamidAtyabi\OAuth2Client\User\User($this->config);
        $result = $client->get("eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsiQVVUSEVOVElDQVRJT04iXSwidXNlcl9uYW1lIjoiYWRtaW4iLCJzY29wZSI6WyJyZWFkIiwid3JpdGUiXSwiZXhwIjoxNTczOTk1MjA1LCJ1c2VySWQiOjEsImF1dGhvcml0aWVzIjpbIlJPTEVfU1VQRVJfQURNSU4iXSwianRpIjoiMTRjYmI2NTAtNmVhYy00Nzc4LWExNzMtODgzNmNhOGMyODdlIiwiY2xpZW50X2lkIjoiY2xpZW50In0.NF2CJUNsmAF59gZi-lAhVk4ZvLmMfXkf62eXQbCKiGfEiwZBxi4OORpYYa1dtXDVnMhcrYo_PKITcsW0OqmpKTdlVjvEt-iDcqfNO2KPfDb6iYLbbybeuGgHuKDCKTrDAJxV_Vc20iWUD_qyfoxcuBZLAtckFXyURpUCGnSMWgXc9uGBAkmWqDf3k8Vrc-qxgV5tPtAIfwIGcwnIo374Jj6L4PCrKPtaS1fs5Kpv0G-YKCLZd790Kby8HcdQ64cCEeIPBhSBGib83K3Zenq6lRe9PGYLWZx8ShE4XUSbP0sjW3Z6l8PF3Fu5F6nx2weOkNZ5Y2pUpEeAGqmXAhToNw");
        print_r($result);
        $this->assertNotNull($result);
        
    }

}