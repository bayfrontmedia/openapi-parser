<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#link-object
 */
class LinkObject extends ObjectMethods
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
    public function getOperationRef(): string
    {
        return Arr::get($this->object, 'operationRef', '');
    }

    /**
     * @return string
     */
    public function getOperationId(): string
    {
        return Arr::get($this->object, 'operationId', '');
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return Arr::get($this->object, 'parameters', []);
    }

    /**
     * @return mixed
     */
    public function getRequestBody(): mixed
    {
        return Arr::get($this->object, 'requestBody');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

    /**
     * @return ServerObject|null
     */
    public function getServer(): ?ServerObject
    {

        if (is_array(Arr::get($this->object, 'server'))) {
            return new ServerObject(Arr::get($this->object, 'server'));
        }

        return null;

    }

}