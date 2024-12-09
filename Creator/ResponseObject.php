<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ResponseObject
{

    private array $responseObject = [];

    public function __construct(string $description)
    {
        $this->responseObject['description'] = $description;
    }

    public function getObject(): array
    {
        return Arr::order($this->responseObject, [
            'description',
            'headers',
            'content',
            'links'
        ]);
    }

    public function addHeaderObject(HeaderObject $headerObject): self
    {
        $this->responseObject['headers'][] = $headerObject->getObject();
        return $this;
    }

    public function addMediaTypeObject(MediaTypeObject $mediaTypeObject): self
    {
        $this->responseObject['content'][] = $mediaTypeObject->getObject();
        return $this;
    }

    public function addLinkObject(LinkObject $linkObject): self
    {
        $this->responseObject['links'][] = $linkObject->getObject();
        return $this;
    }

}