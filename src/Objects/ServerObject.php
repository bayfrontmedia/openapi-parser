<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;
use Bayfront\Validator\Validate;

/**
 * See: https://swagger.io/specification/#server-object
 */
class ServerObject extends ObjectMethods
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

        if (!Validate::url(Arr::get($this->object, 'url', ''))) {
            throw new OpenApiException('Invalid ServerObject URL');
        }

    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return Arr::get($this->object, 'url', '');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

    /**
     * Get array of ServerVariableObjects.
     *
     * @return array
     */
    public function getVariables(): array
    {

        if (is_array(Arr::get($this->object, 'variables'))) {

            $return = [];

            foreach (Arr::get($this->object, 'variables') as $k => $object) {
                $return[$k] = new ServerVariableObject($object);
            }

            return $return;

        }

        return [];

    }

}