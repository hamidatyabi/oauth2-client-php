# oauth2-client-php
You can use this library for connect to your authentication server

# Login and get new token
You can send username and password and get new token
```php
$config = array(
    "oauth2_host" => "localhost",
    "oauth2_port" => "port",
    "oauth2_client_id" => "client_id",
    "oauth2_client_secret" => "client_secret"
);
$client = new \HamidAtyabi\OAuth2Client\AccessToken\AccessToken($config);
$result = $client->get("username", "password");
```

# Check your AccessToken
You can check access_token validity with server
```php
$config = array(
    "oauth2_host" => "localhost",
    "oauth2_port" => "port",
    "oauth2_client_id" => "client_id",
    "oauth2_client_secret" => "client_secret"
);
$client = new \HamidAtyabi\OAuth2Client\AccessToken\AccessToken($config);
$result = $client->validity("access_token");
```

# Refresh your token
You can refresh your token by refresh_token
```php
$config = array(
    "oauth2_host" => "localhost",
    "oauth2_port" => "port",
    "oauth2_client_id" => "client_id",
    "oauth2_client_secret" => "client_secret"
);
$client = new \HamidAtyabi\OAuth2Client\RefreshToken\RefreshToken($config);
$result = $client->refresh("refresh_token");
```

# Get user details information
You can get details of user information
```php
$config = array(
    "oauth2_host" => "localhost",
    "oauth2_port" => "port",
    "oauth2_client_id" => "client_id",
    "oauth2_client_secret" => "client_secret"
);
$client = new \HamidAtyabi\OAuth2Client\User\User($config);
$result = $client->get("access_token");
```

