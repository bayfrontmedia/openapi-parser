<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ContactObject
{

    private array $contactObject = [];

    public function getObject(): array
    {
        return Arr::order($this->contactObject, [
            'name',
            'url',
            'email'
        ]);
    }

    public function name(string $value): self
    {
        $this->contactObject['name'] = $value;
        return $this;
    }

    public function url(string $value): self
    {
        $this->contactObject['url'] = $value;
        return $this;
    }

    public function email(string $value): self
    {
        $this->contactObject['email'] = $value;
        return $this;
    }

}