<?php

    require(__DIR__ . '/../vendor/autoload.php');

    $options = [
        'clientId'     => '[consumer_key]',
        'clientSecret' => '[consumer_secret]',
        'redirectUri'  => '[redirect_uri]',
    ];

    // Refresh token previously saved from authorization
    $refreshToken = 'MTIzNDU2Nzg5MA==';

    $provider = new rmartignoni\OAuth2\Client\Provider\Yahoo($options);

    $grant = new League\OAuth2\Client\Grant\RefreshToken();

    $token = $provider->getAccessToken($grant, ['refresh_token' => $refreshToken]);

    echo json_decode($token);
