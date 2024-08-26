<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#openapi-object
 */
class OpenApiObject extends ObjectMethods
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

        if (!is_string(Arr::get($this->object, 'openapi'))) {
            throw new OpenApiException('Invalid OpenApiObject openapi value');
        }

        if (!is_array(Arr::get($this->object, 'info'))) {
            throw new OpenApiException('Invalid OpenApiObject info value');
        }

    }

    /**
     * Return version number of OpenAPI specification.
     *
     * @return string
     */
    public function getOpenapi(): string
    {
        return Arr::get($this->object, 'openapi', '');
    }

    /**
     * Return metadata about the API.
     *
     * @return InfoObject|null
     */
    public function getInfo(): ?InfoObject
    {

        if (Arr::has($this->object, 'info')) {
            return new InfoObject(Arr::get($this->object, 'info'));
        }

        return null;

    }

    /**
     * @return string
     */
    public function getJsonSchemaDialect(): string
    {
        return Arr::get($this->object, 'jsonSchemaDialect', '');
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

            foreach (Arr::get($this->object, 'servers') as $server) {
                $return[] = new ServerObject($server);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of PathsObjects.
     *
     * @return array
     */
    public function getPaths(): array
    {

        if (is_array(Arr::get($this->object, 'paths'))) {

            $return = [];

            foreach (Arr::get($this->object, 'paths') as $k => $object) {
                $return[$k] = new PathsObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return single path item object.
     *
     * @param string $path
     * @return PathItemObject|null
     */
    public function getPath(string $path): ?PathItemObject
    {

        if (isset($this->object['paths'][$path])) {
            return new PathItemObject($this->object['paths'][$path]);
        }

        return null;

    }

    /**
     * Return array of PathItemObjects.
     *
     * @return array
     */

    public function getWebhooks(): array
    {

        if (is_array(Arr::get($this->object, 'webhooks'))) {

            $return = [];

            foreach (Arr::get($this->object, 'webhooks') as $k => $object) {
                $return[$k] = new PathItemObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * @return ComponentsObject|null
     */
    public function getComponents(): ?ComponentsObject
    {

        if (Arr::has($this->object, 'components')) {
            return new ComponentsObject(Arr::get($this->object, 'components'));
        }

        return null;

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

            foreach (Arr::get($this->object, 'security') as $security) {
                $return[] = new SecurityRequirementObject($security);
            }

            return $return;

        }

        return [];

    }

    /**
     * Return array of TagObjects.
     *
     * @return array
     */
    public function getTags(): array
    {

        if (is_array(Arr::get($this->object, 'tags'))) {

            $return = [];

            foreach (Arr::get($this->object, 'tags') as $k => $object) {
                $return[$k] = new TagObject($object);
            }

            return $return;

        }

        return [];

    }

    /**
     * @return ExternalDocumentationObject|null
     */
    public function getExternalDocs(): ?ExternalDocumentationObject
    {

        if (Arr::has($this->object, 'externalDocs')) {
            return new ExternalDocumentationObject(Arr::get($this->object, 'externalDocs'));
        }

        return null;

    }

}