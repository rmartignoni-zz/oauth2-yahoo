<?php

    session_start();

    require(__DIR__ . '/../vendor/autoload.php');

    $state = isset($_GET['state']) ? $_GET['state'] : null;
    $code  = isset($_GET['code']) ? $_GET['code'] : null;

    if (empty($state) || ($state !== $_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);

        die('Invalid state');
    }

    if (empty($code)) {
        die('Invalid code');
    }

    $options = [
        'clientId'     => '[consumer_key]',
        'clientSecret' => '[consumer_secret]',
        'redirectUri'  => '[redirect_uri]',
    ];

    $provider = new rmartignoni\OAuth2\Client\Provider\Yahoo($options);

    $token = $provider->getAccessToken('authorization_code', ['code' => $code]);

    echo json_decode($token);
