<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;
use Bayfront\Validator\Rules\Url;

/**
 * See: https://swagger.io/specification/#reference-object
 */
class ReferenceObject extends ObjectMethods
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

        $validateUrl = new Url(Arr::get($this->object, '$ref', ''));

        if (!$validateUrl->isValid()) {
            throw new OpenApiException('Invalid ReferenceObject $ref value');
        }

    }

    /**
     * @return string
     */
    public function getRef(): string
    {
        return Arr::get($this->object, '$ref', '');
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return Arr::get($this->object, 'summary', '');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

}