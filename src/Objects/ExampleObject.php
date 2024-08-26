<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#example-object
 */
class ExampleObject extends ObjectMethods
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
     * @return string
     */
    public function getSummary(): string
    {
        return Arr::get($this->object, 'summary', '');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return Arr::get($this->object, 'value');
    }

    /**
     * @return string
     */
    public function getExternalValue(): string
    {
        return Arr::get($this->object, 'externalValue', '');
    }

}