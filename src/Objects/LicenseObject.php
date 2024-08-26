<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#license-object
 */
class LicenseObject extends ObjectMethods
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
            throw new OpenApiException('Invalid LicenseObject name');
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
    public function getIdentifier(): string
    {
        return Arr::get($this->object, 'identifier', '');
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return Arr::get($this->object, 'url', '');
    }

}