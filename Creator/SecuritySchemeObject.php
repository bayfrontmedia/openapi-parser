<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class SecuritySchemeObject
{

    private array $securitySchemeObject = [];

    public const TYPE_APIKEY = 'apiKey';
    public const TYPE_HTTP = 'http';
    public const TYPE_MUTUALTLS = 'mutualTLS';
    public const TYPE_OAUTH2 = 'oauth2';
    public const TYPE_OPENIDCONNECT = 'openIdConnect';

    public function __construct(string $type)
    {
        $this->securitySchemeObject['type'] = $type;
    }

    public function getObject(): array
    {
        return Arr::order($this->securitySchemeObject, [
            'type',
            'description',
            'name',
            'in',
            'scheme',
            'bearerFormat',
            'flows',
            'openIdConnectUrl'
        ]);
    }

    public function description(string $value): self
    {
        $this->securitySchemeObject['description'] = $value;
        return $this;
    }

    public function name(string $value): self
    {
        $this->securitySchemeObject['name'] = $value;
        return $this;
    }

    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_COOKIE = 'cookie';

    public function in(string $value): self
    {
        $this->securitySchemeObject['in'] = $value;
        return $this;
    }

    public function scheme(string $value): self
    {
        $this->securitySchemeObject['scheme'] = $value;
        return $this;
    }

    public function bearerFormat(string $value): self
    {
        $this->securitySchemeObject['bearerFormat'] = $value;
        return $this;
    }

    public function flows(OAuthFlowsObject $oauthFlowsObject): self
    {
        $this->securitySchemeObject['flows'] = $oauthFlowsObject->getObject();
        return $this;
    }

    public function openIdConnectUrl(string $value): self
    {
        $this->securitySchemeObject['openIdConnectUrl'] = $value;
        return $this;
    }

}