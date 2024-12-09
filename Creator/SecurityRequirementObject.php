<?php

namespace Bayfront\OpenApi\Creator;

class SecurityRequirementObject
{

    private array $securityRequirementObject = [];

    public function __construct(string $name, array $type = [])
    {
        $this->securityRequirementObject[$name] = $type;
    }

    public function getObject(): array
    {
        return $this->securityRequirementObject;
    }

}