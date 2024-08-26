<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#request-body-object
 */
class RequestBodyObject extends ObjectMethods
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

        if (!is_array(Arr::get($this->object, 'content'))) {
            throw new OpenApiException('Invalid RequestBodyObject content value');
        }

    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
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

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return Arr::get($this->object, 'required', false);
    }

}