<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#header-object
 */
class HeaderObject extends ObjectMethods
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
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return Arr::get($this->object, 'required', false);
    }

    /**
     * @return bool
     */
    public function getDepreciated(): bool
    {
        return Arr::get($this->object, 'depreciated', false);
    }

    /**
     * @return bool
     */
    public function getAllowEmptyValue(): bool
    {
        return Arr::get($this->object, 'allowEmptyValue', false);
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return Arr::get($this->object, 'style', '');
    }

    /**
     * @return bool
     */
    public function getExplode(): bool
    {
        return Arr::get($this->object, 'explode', false);
    }

    /**
     * @return bool
     */
    public function getAllowReserved(): bool
    {
        return Arr::get($this->object, 'allowReserved', false);
    }

    /**
     * @return SchemaObject|null
     */
    public function getSchema(): ?SchemaObject
    {

        if (is_array(Arr::get($this->object, 'schema'))) {
            return new SchemaObject(Arr::get($this->object, 'schema'));
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

    /**
     * Return array of ExampleObjects.
     *
     * @return array
     */
    public function getExamples(): array
    {

        if (is_array(Arr::get($this->object, 'examples'))) {

            $return = [];

            foreach (Arr::get($this->object, 'examples') as $k => $object) {
                $return[$k] = new ExampleObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of MediaTypeObjects.
     * @return array
     */
    public function getContent(): array
    {

        if (is_array(Arr::get($this->object, 'content'))) {

            $return = [];

            foreach (Arr::get($this->object, 'content') as $k => $object) {
                $return[$k] = new MediaTypeObject($object);
            }

            return $return;

        }

        return [];

    }

}