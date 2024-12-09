<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ServerVariableObject
{

    private array $serverVariableObject = [];

    public function __construct(string $default)
    {
        $this->serverVariableObject['default'] = $default;
    }

    public function getObject(): array
    {
        return Arr::order($this->serverVariableObject, [
            'enum',
            'default',
            'description'
        ]);
    }

    public function addEnum(string $value): self
    {
        $this->serverVariableObject['enum'][] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->serverVariableObject['description'] = $value;
        return $this;
    }

}