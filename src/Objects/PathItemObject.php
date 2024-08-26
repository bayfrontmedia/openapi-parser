<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#path-item-object
 */
class PathItemObject extends ObjectMethods
{

    public function __construct(array $object)
    {
        parent::__construct($object);
    }

    public const OPERATION_GET = 'get';
    public const OPERATION_PUT = 'put';
    public const OPERATION_POST = 'post';
    public const OPERATION_DELETE = 'delete';
    public const OPERATION_OPTIONS = 'options';
    public const OPERATION_HEAD = 'head';
    public const OPERATION_PATCH = 'patch';
    public const OPERATION_TRACE = 'trace';

    /**
     * @inheritDoc
     */
    public function validate(): void
    {

    }

    /**
     * @return string
     */
    public function getRef(): string
    {
        return Arr::get($this->object, '$ref', '');
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
     * Get single operation object.
     *
     * @param string $operation (Operation constant)
     * @return OperationObject|null
     */
    public function getOperation(string $operation): ?OperationObject
    {

        if (is_array(Arr::get($this->object, $operation))) {
            return new OperationObject(Arr::get($this->object, $operation));
        }

        return null;

    }

    /**
     * Return array of ServerObjects.
     *
     * @return array
     */
    public function getServers(): array
    {

        if (is_array(Arr::get($this->object, 'servers'))) {

            $return = [];

            foreach (Arr::get($this->object, 'servers') as $k => $object) {
                $return[$k] = new ServerObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of ParameterObjects.
     *
     * @return array
     */
    public function getParameters(): array
    {

        if (is_array(Arr::get($this->object, 'parameters'))) {

            $return = [];

            foreach (Arr::get($this->object, 'parameters') as $k => $object) {
                $return[$k] = new ParameterObject($object);
            }

            return $return;

        }

        return [];

    }

}