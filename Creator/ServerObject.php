<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ServerObject
{

    private array $serverObject = [];

    public function __construct(string $url)
    {
        $this->serverObject['url'] = $url;
    }

    public function getObject(): array
    {
        return Arr::order($this->serverObject, [
            'url',
            'description',
            'variables'
        ]);
    }

    public function description(string $value): self
    {
        $this->serverObject['description'] = $value;
        return $this;
    }

    public function addServerVariableObject(ServerVariableObject $serverVariableObject): self
    {
        $this->serverObject['variables'][] = $serverVariableObject->getObject();
        return $this;
    }

}