<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class LinkObject
{

    private array $linkObject = [];

    public function getObject(): array
    {
        return Arr::order($this->linkObject, [
            'operationRef',
            'operationId',
            'parameters',
            'requestBody',
            'description',
            'server'
        ]);
    }

    public function operationRef(string $value): self
    {
        $this->linkObject['operationRef'] = $value;
        return $this;
    }

    public function operationId(string $value): self
    {
        $this->linkObject['operationId'] = $value;
        return $this;
    }

    public function addParameter(string $value): self
    {
        $this->linkObject['parameters'][] = $value;
        return $this;
    }

    public function requestBody(mixed $value): self
    {
        $this->linkObject['requestBody'] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->linkObject['description'] = $value;
        return $this;
    }

    public function server(ServerObject $serverObject): self
    {
        $this->linkObject['server'] = $serverObject->getObject();
        return $this;
    }

}