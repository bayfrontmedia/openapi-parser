<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#paths-object
 */
class PathsObject extends ObjectMethods
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
     * Get single PathItemObject.
     *
     * @param string $path
     * @return PathItemObject|null
     */
    public function get(string $path): ?PathItemObject
    {

        if (is_array(Arr::get($this->object, $path))) {
            return new PathItemObject(Arr::get($this->object, $path));
        }

        return null;

    }

}