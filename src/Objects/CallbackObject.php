<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#callback-object
 */
class CallbackObject extends ObjectMethods
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
     * Get single path item object.
     *
     * @param string $expression
     * @return PathItemObject|null
     */
    public function get(string $expression): ?PathItemObject
    {

        if (is_array(Arr::get($this->object, $expression))) {
            return new PathItemObject(Arr::get($this->object, $expression));
        }

        return null;

    }

}