<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class OAuthFlowsObject
{

    private array $oauthFlowsObject = [];

    public function getObject(): array
    {
        return Arr::order($this->oauthFlowsObject, [
            'implicit',
            'password',
            'clientCredentials',
            'authorizationCode'
        ]);
    }

    public function implicit(OAuthFlowObject $OAuthFlowObject): self
    {
        $this->oauthFlowsObject['implicit'] = $OAuthFlowObject->getObject();
        return $this;
    }

    public function password(OAuthFlowObject $OAuthFlowObject): self
    {
        $this->oauthFlowsObject['password'] = $OAuthFlowObject->getObject();
        return $this;
    }

    public function clientCredentials(OAuthFlowObject $OAuthFlowObject): self
    {
        $this->oauthFlowsObject['clientCredentials'] = $OAuthFlowObject->getObject();
        return $this;
    }

    public function authorizationCode(OAuthFlowObject $OAuthFlowObject): self
    {
        $this->oauthFlowsObject['authorizationCode'] = $OAuthFlowObject->getObject();
        return $this;
    }

}