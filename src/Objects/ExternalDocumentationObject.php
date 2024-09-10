<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;
use Bayfront\Validator\Rules\Url;

/**
 * See: https://swagger.io/specification/#external-documentation-object
 */
class ExternalDocumentationObject extends ObjectMethods
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

        $validateUrl = new Url(Arr::get($this->object, 'url', ''));

        if (!$validateUrl->isValid()) {
            throw new OpenApiException('Invalid ExternalDocumentationObject URL');
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
     * @return string
     */
    public function getUrl(): string
    {
        return Arr::get($this->object, 'url', '');
    }

}