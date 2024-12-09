<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class LicenseObject
{

    private array $licenseObject = [];

    public function __construct(string $name)
    {
        $this->licenseObject['name'] = $name;
    }

    public function getObject(): array
    {
        return Arr::order($this->licenseObject, [
            'name',
            'identifier',
            'url'
        ]);
    }

    public function identifier(string $value): self
    {
        $this->licenseObject['identifier'] = $value;
        return $this;
    }

    public function url(string $value): self
    {
        $this->licenseObject['url'] = $value;
        return $this;
    }

}