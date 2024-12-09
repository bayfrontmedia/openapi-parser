<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class TagObject
{

    private array $tagObject = [];

    public function __construct(string $name)
    {
        $this->tagObject['name'] = $name;
    }

    public function getObject(): array
    {
        return Arr::order($this->tagObject, [
            'name',
            'description',
            'externalDocs'
        ]);
    }

    public function description(string $value): self
    {
        $this->tagObject['description'] = $value;
        return $this;
    }

    public function externalDocs(ExternalDocumentationObject $externalDocumentationObject): self
    {
        $this->tagObject['externalDocs'] = $externalDocumentationObject->getObject();
        return $this;
    }

}