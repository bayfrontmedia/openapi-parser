<?php

namespace Bayfront\OpenApi\Creator;

class VariableObject
{

    private array $variableObject = [];

    public function get(): array
    {
        return $this->variableObject;
    }

}