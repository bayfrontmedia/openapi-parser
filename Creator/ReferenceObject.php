<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ReferenceObject
{

    private array $referenceObject = [];

    public function __construct(string $ref)
    {
        $this->referenceObject['$ref'] = $ref;
    }

    public function getObject(): array
    {
        return Arr::order($this->referenceObject, [
            '$ref',
            'summary',
            'description'
        ]);
    }

    public function summary(string $value): self
    {
        $this->referenceObject['summary'] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->referenceObject['description'] = $value;
        return $this;
    }

}