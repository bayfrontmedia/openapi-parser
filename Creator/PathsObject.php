<?php

namespace Bayfront\OpenApi\Creator;

class PathsObject
{

    private array $pathsObject = [];

    public function getObject(): array
    {
        ksort($this->pathsObject);
        return $this->pathsObject;
    }

    public function addPathItemObject(string $field_pattern, PathItemObject $pathItemObject): self
    {
        $this->pathsObject[$field_pattern] = $pathItemObject->getObject();
        return $this;
    }

}