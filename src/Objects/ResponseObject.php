<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#response-object
 */
class ResponseObject extends ObjectMethods
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

        if (!is_string(Arr::get($this->object, 'description'))) {
            throw new OpenApiException('Invalid ResponseObject description value');
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
     * Return array of LinkObjects.
     *
     * @return array
     */
    public function getLinks(): array
    {

        if (is_array(Arr::get($this->object, 'links'))) {

            $return = [];

            foreach (Arr::get($this->object, 'links') as $k => $object) {
                $return[$k] = new LinkObject($object);
            }

            return $return;

        }

        return [];

    }

}