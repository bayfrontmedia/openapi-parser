<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#parameter-object
 */
class ParameterObject extends ObjectMethods
{

    public function __construct(array $object)
    {
        parent::__construct($object);
    }

    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_PATH = 'path';
    public const IN_COOKIE = 'cookie';

    /**
     * @inheritDoc
     */
    public function validate(): void
    {

        if (!is_string(Arr::get($this->object, 'name'))) {
            throw new OpenApiException('Invalid ParameterObject name');
        }

        if (!in_array(Arr::get($this->object, 'in'), [
            self::IN_QUERY,
            self::IN_HEADER,
            self::IN_PATH,
            self::IN_COOKIE
        ])) {
            throw new OpenApiException('Invalid ParameterObject in value');
        }

        if (Arr::get($this->object, 'in') === self::IN_PATH &&
            Arr::get($this->object, 'required') !== true) {
            throw new OpenApiException('Invalid ParameterObject required value (must be true)');
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
    public function getIn(): string
    {
        return Arr::get($this->object, 'in', '');
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
     *
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