<?php

    namespace rmartignoni\OAuth2\Client\Provider;

    use League\OAuth2\Client\Provider\AbstractProvider;
    use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
    use League\OAuth2\Client\Token\AccessToken;
    use Psr\Http\Message\RequestInterface;
    use Psr\Http\Message\ResponseInterface;

    class Yahoo extends AbstractProvider
    {
        /**
         * Get authorization url to begin OAuth flow
         *
         * @return string
         */
        public function getBaseAuthorizationUrl()
        {
            return 'https://api.login.yahoo.com/oauth2/request_auth';
        }

        /**
         * Get access token url to retrieve token
         *
         * @param array $params
         *
         * @return string
         */
        public function getBaseAccessTokenUrl(array $params)
        {
            return 'https://api.login.yahoo.com/oauth2/get_token';
        }

        /**
         * Returns a PSR-7 request instance which is not already authenticated.
         *
         * This method is overloading it's parent since Yahoo OAuth API requires the client_id to be Base64 encoded and
         * sent as HTTP Basic Auth.
         *
         * @param  string $method
         * @param  string $url
         * @param  array  $options Any of "headers", "body", and "protocolVersion".
         *
         * @return RequestInterface
         */
        public function getRequest($method, $url, array $options = [])
        {
            $token = $this->clientId . ':' . $this->clientSecret;

            return $this->createRequest($method, $url, $token, $options);
        }

        /**
         * Get authorization headers used by this provider.
         *
         * This method is overloading it's parent since Yahoo OAuth API requires the client_id to be Base64 encoded and
         * sent as HTTP Basic Auth.
         *
         * @param null $token
         *
         * @return array
         */
        protected function getAuthorizationHeaders($token = null)
        {
            return ['Authorization' => 'Basic ' . base64_encode($token)];
        }

        /**
         * Get additional headers used by this provider.
         *
         * Typically this is used to set Accept or Content-Type headers.
         *
         * @return array
         */
        protected function getDefaultHeaders()
        {
            return ['content-type' => 'application/x-www-form-urlencoded'];
        }


        public function getUserDetailsUrl(AccessToken $token)
        {
            // TODO: Implement getUserDetailsUrl() method.
        }

        /**
         * Get the default scopes used by this provider.
         *
         * This should not be a complete list of all scopes, but the minimum
         * required for the provider user interface!
         *
         * @return array
         */
        protected function getDefaultScopes()
        {
            // TODO: Implement getDefaultScopes() method.
        }

        /**
         * Check a provider response for errors.
         *
         * @throws IdentityProviderException
         *
         * @param  ResponseInterface $response
         * @param  string            $data Parsed response data
         *
         * @return void
         */
        protected function checkResponse(ResponseInterface $response, $data)
        {
            // TODO: Implement checkResponse() method.
        }

        /**
         * Generate a user object from a successful user details request.
         *
         * @param array       $response
         * @param AccessToken $token
         *
         * @return \League\OAuth2\Client\Provider\UserInterface
         */
        protected function createUser(array $response, AccessToken $token)
        {
            // TODO: Implement createUser() method.
        }
    }
