<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#info-object
 */
class InfoObject extends ObjectMethods
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

        if (!is_string(Arr::get($this->object, 'title'))) {
            throw new OpenApiException('Invalid InfoObject title');
        }

        if (!is_string(Arr::get($this->object, 'version'))) {
            throw new OpenApiException('Invalid InfoObject version');
        }

    }

    /**
     * Get the title of the API.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return Arr::get($this->object, 'title', '');
    }

    /**
     * Get summary of the API.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return Arr::get($this->object, 'summary', '');
    }

    /**
     * Get description of the API.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

    /**
     * Get URL to the Terms of Service for the API.
     *
     * @return string
     */
    public function getTermsOfService(): string
    {
        return Arr::get($this->object, 'termsOfService', '');
    }

    /**
     * @return ContactObject|null
     */
    public function getContact(): ?ContactObject
    {

        if (is_array(Arr::get($this->object, 'contact'))) {
            return new ContactObject(Arr::get($this->object, 'contact'));
        }

        return null;

    }

    /**
     * @return LicenseObject|null
     */
    public function getLicense(): ?LicenseObject
    {

        if (is_array(Arr::get($this->object, 'license'))) {
            return new LicenseObject(Arr::get($this->object, 'license'));
        }

        return null;

    }

    /**
     * Get version of the OpenAPI document.
     *
     * @return string
     */
    public function getVersion(): string
    {
        return Arr::get($this->object, 'version', '');
    }

}