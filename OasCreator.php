<?php

namespace Bayfront\OpenApi;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Creator\ComponentsObject;
use Bayfront\OpenApi\Creator\ExternalDocumentationObject;
use Bayfront\OpenApi\Creator\InfoObject;
use Bayfront\OpenApi\Creator\PathsObject;
use Bayfront\OpenApi\Creator\SecurityRequirementObject;
use Bayfront\OpenApi\Creator\ServerObject;
use Bayfront\OpenApi\Creator\TagObject;

/**
 * See:
 * https://swagger.io/specification/#openapi-object
 */
class OasCreator
{

    private array $openApiObject = [];

    public function __construct(InfoObject $infoObject, string $openapi = '3.1.1')
    {
        $this->openApiObject['openapi'] = $openapi;
        $this->openApiObject['info'] = $infoObject->getObject();
    }

    public function getObject(): array
    {
        return Arr::order($this->openApiObject, [
            'openapi',
            'info',
            'jsonSchemaDialect',
            'servers',
            'paths',
            'webhooks',
            'components',
            'security',
            'tags',
            'externalDocs'
        ]);
    }

    public function jsonSchemaDialect(string $value): self
    {
        $this->openApiObject['jsonSchemaDialect'] = $value;
        return $this;
    }

    public function addServerObject(ServerObject $serverObject): self
    {
        $this->openApiObject['servers'][] = $serverObject->getObject();
        return $this;
    }

    public function paths(PathsObject $pathsObject): self
    {
        $this->openApiObject['paths'] = $pathsObject->getObject();
        return $this;
    }

    /*
     * TODO:
     * webhooks
     */

    public function components(ComponentsObject $componentsObject): self
    {
        $this->openApiObject['components'] = $componentsObject->getObject();
        return $this;
    }

    public function addSecurityRequirementObject(SecurityRequirementObject $securityRequirementObject): self
    {
        $this->openApiObject['security'][] = $securityRequirementObject->getObject();
        return $this;
    }

    public function addTagObject(TagObject $tagObject): self
    {
        $this->openApiObject['tags'][] = $tagObject->getObject();
        return $this;
    }

    public function externalDocs(ExternalDocumentationObject $externalDocumentationObject): self
    {
        $this->openApiObject['externalDocs'] = $externalDocumentationObject->getObject();
        return $this;
    }

}