<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#encoding-object
 */
class EncodingObject extends ObjectMethods
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
    public function getContentType(): string
    {
        return Arr::get($this->object, 'contentType', '');
    }

    /**
     * Return array of HeaderObjects.
     *
     * @return array
     */
    public function getHeaders(): array
    {

        if (is_array(Arr::get($this->object, 'headers'))) {

            $return = [];

            foreach (Arr::get($this->object, 'headers') as $k => $object) {
                $return[$k] = new HeaderObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return Arr::get($this->object, 'style', '');
    }

    /**
     * @return bool
     */
    public function getExplode(): bool
    {
        return Arr::get($this->object, 'explode', false);
    }

    /**
     * @return bool
     */
    public function getAllowReserved(): bool
    {
        return Arr::get($this->object, 'allowReserved', false);
    }

}