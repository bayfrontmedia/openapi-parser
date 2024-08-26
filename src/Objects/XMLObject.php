<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#xml-object
 */
class XMLObject extends ObjectMethods
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
    public function getName(): string
    {
        return Arr::get($this->object, 'name', '');
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return Arr::get($this->object, 'namespace', '');
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return Arr::get($this->object, 'prefix', '');
    }

    /**
     * @return bool
     */
    public function getAttribute(): bool
    {
        return Arr::get($this->object, 'attribute', false);
    }

    /**
     * @return bool
     */
    public function getWrapped(): bool
    {
        return Arr::get($this->object, 'wrapped', false);
    }

}