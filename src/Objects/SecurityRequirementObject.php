<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#security-requirement-object
 */
class SecurityRequirementObject extends ObjectMethods
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
     * Get security schemes for a single operation.
     *
     * @param string $operation
     * @return array
     */
    public function get(string $operation): array
    {
        return Arr::get($this->object, $operation, []);
    }

}