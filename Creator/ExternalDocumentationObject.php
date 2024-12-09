<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ExternalDocumentationObject
{

    private array $externalDocumentationObject = [];

    public function __construct(string $url)
    {
        $this->externalDocumentationObject['url'] = $url;
    }

    public function getObject(): array
    {
        return Arr::order($this->externalDocumentationObject, [
            'description',
            'url'
        ]);
    }

    public function description(string $value): self
    {
        $this->externalDocumentationObject['description'] = $value;
        return $this;
    }

}