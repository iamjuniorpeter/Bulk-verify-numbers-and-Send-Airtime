<?php

namespace Vonage\Client\Credentials\Handler;

use Psr\Http\Message\RequestInterface;
use Vonage\Client\Credentials\Basic;
use Vonage\Client\Credentials\CredentialsInterface;

class BasicHandler extends AbstractHandler
{
    public function __invoke(RequestInterface $request, CredentialsInterface $credentials)
    {
        $credentials = $this->extract(Basic::class, $credentials);

        $c = $credentials->asArray();
        $cx = base64_encode($c['api_key'] . ':' . $c['api_secret']);

        $request = $request->withHeader('Authorization', 'Basic ' . $cx);

        return $request;
    }
}