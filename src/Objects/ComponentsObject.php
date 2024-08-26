<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#components-object
 */
class ComponentsObject extends ObjectMethods
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
     * Return array of SchemaObjects.
     *
     * @return array
     */
    public function getSchemas(): array
    {

        if (is_array(Arr::get($this->object, 'schemas'))) {

            $return = [];

            foreach (Arr::get($this->object, 'schemas') as $k => $object) {
                $return[$k] = new SchemaObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of ResponseObjects.
     *
     * @return array
     */
    public function getResponses(): array
    {

        if (is_array(Arr::get($this->object, 'responses'))) {

            $return = [];

            foreach (Arr::get($this->object, 'responses') as $k => $object) {
                $return[$k] = new ResponseObject($object);
            }

            return $return;

        }

        return [];

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
     * Return array of ExampleObjects.
     *
     * @return array
     */
    public function getExamples(): array
    {

        if (is_array(Arr::get($this->object, 'examples'))) {

            $return = [];

            foreach (Arr::get($this->object, 'examples') as $k => $object) {
                $return[$k] = new ExampleObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of RequestBodyObjects.
     *
     * @return array
     */
    public function getRequestBodies(): array
    {

        if (is_array(Arr::get($this->object, 'requestBodies'))) {

            $return = [];

            foreach (Arr::get($this->object, 'requestBodies') as $k => $object) {
                $return[$k] = new RequestBodyObject($object);
            }

            return $return;

        }

        return [];

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
     * Return array of SecuritySchemeObjects.
     *
     * @return array
     */
    public function getSecuritySchemes(): array
    {

        if (is_array(Arr::get($this->object, 'securitySchemes'))) {

            $return = [];

            foreach (Arr::get($this->object, 'securitySchemes') as $k => $object) {
                $return[$k] = new SecuritySchemeObject($object);
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
     * Return array of PathItemObjects.
     *
     * @return array
     */
    public function getPathItems(): array
    {

        if (is_array(Arr::get($this->object, 'pathItems'))) {

            $return = [];

            foreach (Arr::get($this->object, 'pathItems') as $k => $object) {
                $return[$k] = new PathItemObject($object);
            }

            return $return;

        }

        return [];

    }

}