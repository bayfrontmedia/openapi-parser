<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#discriminator-object
 */
class DiscriminatorObject extends ObjectMethods
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

        if (!is_string(Arr::get($this->object, 'propertyName'))) {
            throw new OpenApiException('Invalid DiscriminatorObject propertyName');
        }

    }

    /**
     * @return string
     */
    public function getPropertyName(): string
    {
        return Arr::get($this->object, 'propertyName', '');
    }

    /**
     * @return array
     */
    public function getMapping(): array
    {
        return Arr::get($this->object, 'mapping', []);
    }

}