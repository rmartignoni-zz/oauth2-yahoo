<?php

    session_start();

    require(__DIR__ . '/../vendor/autoload.php');

    $options = [
        'clientId'    => '[consumer_key]',
        'redirectUri' => '[redirect_uri]',
    ];

    $provider = new rmartignoni\OAuth2\Client\Provider\Yahoo($options);

    $authorizationUrl = $provider->getAuthorizationUrl();

    $_SESSION['oauth2state'] = $provider->getState();

    header('Location: ' . $authorizationUrl);
