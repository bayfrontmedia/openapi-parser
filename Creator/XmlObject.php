<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class XmlObject
{

    private array $xmlObject = [];

    public function getObject(): array
    {
        return Arr::order($this->xmlObject, [
            'name',
            'namespace',
            'prefix',
            'attribute',
            'wrapped'
        ]);
    }

    public function name(string $value): self
    {
        $this->xmlObject['name'] = $value;
        return $this;
    }

    public function namespace(string $value): self
    {
        $this->xmlObject['namespace'] = $value;
        return $this;
    }

    public function prefix(string $value): self
    {
        $this->xmlObject['prefix'] = $value;
        return $this;
    }

    public function attribute(bool $value): self
    {
        $this->xmlObject['attribute'] = $value;
        return $this;
    }

    public function wrapped(bool $value): self
    {
        $this->xmlObject['wrapped'] = $value;
        return $this;
    }

}