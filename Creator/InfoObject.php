<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class InfoObject
{

    private array $infoObject = [];

    public function __construct(string $title, string $version)
    {
        $this->infoObject['title'] = $title;
        $this->infoObject['version'] = $version;
    }

    public function getObject(): array
    {
        return Arr::order($this->infoObject, [
            'title',
            'summary',
            'description',
            'termsOfService',
            'contact',
            'license',
            'version'
        ]);
    }

    public function summary(string $value): self
    {
        $this->infoObject['summary'] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->infoObject['description'] = $value;
        return $this;
    }

    public function termsOfService(string $value): self
    {
        $this->infoObject['termsOfService'] = $value;
        return $this;
    }

    public function contact(ContactObject $contactObject): self
    {
        $this->infoObject['contact'] = $contactObject->getObject();
        return $this;
    }

    public function license(LicenseObject $licenseObject): self
    {
        $this->infoObject['license'] = $licenseObject->getObject();
        return $this;
    }

}