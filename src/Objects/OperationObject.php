<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#operation-object
 */
class OperationObject extends ObjectMethods
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
     * @return array
     */
    public function getTags(): array
    {
        return Arr::get($this->object, 'tags', []);
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

    /**
     * @return ExternalDocumentationObject|null
     */
    public function getExternalDocs(): ?ExternalDocumentationObject
    {

        if (is_array(Arr::get($this->object, 'externalDocs'))) {
            return new ExternalDocumentationObject(Arr::get($this->object, 'externalDocs'));
        }

        return null;

    }

    /**
     * @return string
     */
    public function getOperationId(): string
    {
        return Arr::get($this->object, 'operationId', '');
    }

    /**
     * Return array of ParameterObjects.
     *
     * @return array
     */
    public function getParameters(): array
    {

        if (is_array(Arr::get($this->object, 'parameters'))) {

            $return = [];

            foreach (Arr::get($this->object, 'parameters') as $k => $object) {
                $return[$k] = new ParameterObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * @return RequestBodyObject|null
     */
    public function getRequestBody(): ?RequestBodyObject
    {

        if (is_array(Arr::get($this->object, 'requestBody'))) {
            return new RequestBodyObject(Arr::get($this->object, 'requestBody'));
        }

        return null;

    }

    /**
     * @return ResponsesObject|null
     */
    public function getResponses(): ?ResponsesObject
    {

        if (is_array(Arr::get($this->object, 'responses'))) {
            return new ResponsesObject(Arr::get($this->object, 'responses'));
        }

        return null;

    }

    /**
     * Return array of CallbackObjects.
     *
     * @return array
     */
    public function getCallbacks(): array
    {

        if (is_array(Arr::get($this->object, 'callbacks'))) {

            $return = [];

            foreach (Arr::get($this->object, 'callbacks') as $k => $object) {
                $return[$k] = new CallbackObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * @return bool
     */
    public function getDepreciated(): bool
    {
        return Arr::get($this->object, 'depreciated', false);
    }

    /**
     * Return array of SecurityRequirementObjects.
     *
     * @return array
     */
    public function getSecurity(): array
    {

        if (is_array(Arr::get($this->object, 'security'))) {

            $return = [];

            foreach (Arr::get($this->object, 'security') as $k => $object) {
                $return[$k] = new SecurityRequirementObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of ServerObjects.
     *
     * @return array
     */
    public function getServers(): array
    {

        if (is_array(Arr::get($this->object, 'servers'))) {

            $return = [];

            foreach (Arr::get($this->object, 'servers') as $k => $object) {
                $return[$k] = new ServerObject($object);
            }

            return $return;

        }

        return [];

    }

}