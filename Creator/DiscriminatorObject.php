<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class DiscriminatorObject
{

    private array $discriminatorObject = [];

    public function __construct(string $propertyName)
    {
        $this->discriminatorObject['propertyName'] = $propertyName;
    }

    public function getObject(): array
    {
        return Arr::order($this->discriminatorObject, [
            'propertyName',
            'mapping'
        ]);
    }

    public function addMapping(string $key, string $value): self
    {
        $this->discriminatorObject['mapping'][$key] = $value;
        return $this;
    }

}