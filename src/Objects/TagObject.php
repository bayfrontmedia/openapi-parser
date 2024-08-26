<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#tag-object
 */
class TagObject extends ObjectMethods
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

        if (!is_string(Arr::get($this->object, 'name'))) {
            throw new OpenApiException('Invalid TagObject name');
        }

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return Arr::get($this->object, 'name', '');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
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

}