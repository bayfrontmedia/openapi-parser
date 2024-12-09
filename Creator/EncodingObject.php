<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class EncodingObject
{

    private array $encodingObject = [];

    public function getObject(): array
    {
        return Arr::order($this->encodingObject, [
            'contentType',
            'headers',
            'style',
            'explode',
            'allowReserved'
        ]);
    }

    public function contentType(string $value): self
    {
        $this->encodingObject['contentType'] = $value;
        return $this;
    }

    public function addHeaderObject(HeaderObject $headerObject): self
    {
        $this->encodingObject['headers'][] = $headerObject->getObject();
        return $this;
    }

    public function style(string $value): self
    {
        $this->encodingObject['style'] = $value;
        return $this;
    }

    public function explode(bool $value): self
    {
        $this->encodingObject['explode'] = $value;
        return $this;
    }

    public function allowReserved(bool $value): self
    {
        $this->encodingObject['allowReserved'] = $value;
        return $this;
    }

}