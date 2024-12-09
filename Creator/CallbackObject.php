<?php

namespace Bayfront\OpenApi\Creator;

class CallbackObject
{

    private array $callbackObject = [];

    public function getObject(): array
    {
        return $this->callbackObject;
    }

    public function addPathItemObject(string $field_pattern, PathItemObject $pathItemObject): self
    {
        $this->callbackObject[$field_pattern] = $pathItemObject->getObject();
        return $this;
    }

}