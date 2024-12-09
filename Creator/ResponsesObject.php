<?php

namespace Bayfront\OpenApi\Creator;

class ResponsesObject
{

    private array $responsesObject = [];

    public function getObject(): array
    {
        ksort($this->responsesObject);
        return $this->responsesObject;
    }

    public const FIELD_DEFAULT = 'default';

    public function addResponseObject(string $field_pattern, ResponsesObject $responsesObject): self
    {
        $this->responsesObject[$field_pattern] = $responsesObject->getObject();
        return $this;
    }

}