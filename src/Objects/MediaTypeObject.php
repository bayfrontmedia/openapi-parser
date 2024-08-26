<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#media-type-object
 */
class MediaTypeObject extends ObjectMethods
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
     * Return array of EncodingObjects.
     *
     * @return array
     */
    public function getEncoding(): array
    {

        if (is_array(Arr::get($this->object, 'encoding'))) {

            $return = [];

            foreach (Arr::get($this->object, 'encoding') as $k => $object) {
                $return[$k] = new EncodingObject($object);
            }

            return $return;

        }

        return [];

    }

}