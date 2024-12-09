<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

/**
 * See: https://swagger.io/specification/#schema-object
 *
 * TODO:
 * Missing "allOf", etc
 */
class SchemaObject
{

    private array $schemaObject = [];

    public function getObject(): array
    {
        return Arr::order($this->schemaObject, [
            'discriminator',
            'xml',
            'externalDocs',
            'example'
        ]);
    }

    public function discriminator(DiscriminatorObject $discriminatorObject): self
    {
        $this->schemaObject['discriminator'] = $discriminatorObject->getObject();
        return $this;
    }

    public function xml(XmlObject $xmlObject): self
    {
        $this->schemaObject['xml'] = $xmlObject->getObject();
        return $this;
    }

    public function externalDocs(ExternalDocumentationObject $externalDocumentationObject): self
    {
        $this->schemaObject['externalDocs'] = $externalDocumentationObject->getObject();
        return $this;
    }

}