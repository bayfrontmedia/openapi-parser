<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class RequestBodyObject
{

    private array $requestBodyObject = [];

    public function __construct(MediaTypeObject $mediaTypeObject)
    {
        $this->requestBodyObject['content'][] = $mediaTypeObject->getObject();
    }

    public function getObject(): array
    {
        return Arr::order($this->requestBodyObject, [
            'description',
            'content',
            'required'
        ]);
    }

    public function description(string $value): self
    {
        $this->requestBodyObject['content'] = $value;
        return $this;
    }

    public function required(bool $value): self
    {
        $this->requestBodyObject['required'] = $value;
        return $this;
    }

    public function addMediaTypeObject(MediaTypeObject $mediaTypeObject): self
    {
        $this->requestBodyObject['content'][] = $mediaTypeObject->getObject();
        return $this;
    }

}