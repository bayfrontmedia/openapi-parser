<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class MediaTypeObject
{

    private array $mediaTypeObject = [];

    public function getObject(): array
    {
        return Arr::order($this->mediaTypeObject, [
            'schema',
            'example',
            'examples',
            'encoding'
        ]);
    }

    public function schema(SchemaObject $schemaObject): self
    {
        $this->mediaTypeObject['schema'] = $schemaObject->getObject();
        return $this;
    }

    public function example(mixed $value): self
    {
        $this->mediaTypeObject['example'] = $value;
        return $this;
    }

    public function addExampleObject(ExampleObject $exampleObject): self
    {
        $this->mediaTypeObject['examples'][] = $exampleObject->getObject();
        return $this;
    }

    public function addEncodingObject(EncodingObject $encodingObject): self
    {
        $this->mediaTypeObject['encoding'][] = $encodingObject->getObject();
        return $this;
    }

}