<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#server-variable-object
 */
class ServerVariableObject extends ObjectMethods
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

        if (!is_string(Arr::get($this->object, 'default'))) {
            throw new OpenApiException('Invalid ServerVariableObject default value');
        }

    }

    /**
     * @return array
     */
    public function getEnum(): array
    {
        return Arr::get($this->object, 'enum', []);
    }

    /**
     * @return string
     */
    public function getDefault(): string
    {
        return Arr::get($this->object, 'default', '');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

}