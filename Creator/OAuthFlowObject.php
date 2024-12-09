<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class OAuthFlowObject
{

    private array $oAuthFlowObject = [];

    /*
     * TODO:
     * Check required based on ...
     */
    public function getObject(): array
    {
        return Arr::order($this->oAuthFlowObject, [
            'authorizationUrl',
            'tokenUrl',
            'refreshUrl',
            'scopes'
        ]);
    }

    public function authorizationUrl(string $value): self
    {
        $this->oAuthFlowObject['authorizationUrl'] = $value;
        return $this;
    }

    public function tokenUrl(string $value): self
    {
        $this->oAuthFlowObject['tokenUrl'] = $value;
        return $this;
    }

    public function refreshUrl(string $value): self
    {
        $this->oAuthFlowObject['refreshUrl'] = $value;
        return $this;
    }

    public function addScope(string $key, string $value): self
    {
        $this->oAuthFlowObject['scopes'][$key] = $value;
        return $this;
    }

}