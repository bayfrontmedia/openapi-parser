<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#responses-object
 */
class ResponsesObject extends ObjectMethods
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

    public const DEFAULT = 'default';

    /**
     * Get single response object.
     *
     * @param string $response
     * @return ResponseObject|null
     */
    public function get(string $response): ?ResponseObject
    {

        if (is_array(Arr::get($this->object, $response))) {
            return new ResponseObject(Arr::get($this->object, $response));
        }

        return null;

    }

}