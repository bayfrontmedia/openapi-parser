<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#schema-object
 */
class SchemaObject extends ObjectMethods
{

    public function __construct(array $object)
    {
        parent::__construct($object);
    }

    /**
     * @inheritDoc
     */
    public function validate(): void
    {

    }

    /**
     * @return DiscriminatorObject|null
     */
    public function getDiscriminator(): ?DiscriminatorObject
    {

        if (is_array(Arr::get($this->object, 'discriminator'))) {
            return new DiscriminatorObject(Arr::get($this->object, 'discriminator'));
        }

        return null;

    }

    /**
     * @return XMLObject|null
     */
    public function getXml(): ?XMLObject
    {

        if (is_array(Arr::get($this->object, 'xml'))) {
            return new XMLObject(Arr::get($this->object, 'xml'));
        }

        return null;

    }

    /**
     * @return ExternalDocumentationObject|null
     */
    public function getExternalDocs(): ?ExternalDocumentationObject
    {

        if (is_array(Arr::get($this->object, 'externalDocs'))) {
            return new ExternalDocumentationObject(Arr::get($this->object, 'externalDocs'));
        }

        return null;

    }

    /**
     * @return mixed
     */
    public function getExample(): mixed
    {
        return Arr::get($this->object, 'example');
    }

}