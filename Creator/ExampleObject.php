<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ExampleObject
{

    private array $exampleObject = [];

    public function getObject(): array
    {
        return Arr::order($this->exampleObject, [
            'summary',
            'description',
            'value',
            'externalValue'
        ]);
    }

    public function summary(string $value): self
    {
        $this->exampleObject['summary'] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->exampleObject['description'] = $value;
        return $this;
    }

    public function value(mixed $value): self
    {
        $this->exampleObject['value'] = $value;
        return $this;
    }

    public function externalValue(string $value): self
    {
        $this->exampleObject['externalValue'] = $value;
        return $this;
    }

}