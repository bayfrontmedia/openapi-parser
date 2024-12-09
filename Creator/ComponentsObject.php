<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class ComponentsObject
{

    private array $componentsObject = [];

    public function getObject(): array
    {

        print_r($this->componentsObject);
        die;
        $dotted = Arr::dot($this->componentsObject);
        ksort($dotted);

        return Arr::order(Arr::undot($dotted), [
            'schemas',
            'responses',
            'parameters',
            'examples',
            'requestBodies',
            'headers',
            'securitySchemes',
            'links',
            'callbacks',
            'pathItems'
        ]);
    }

    public function addSchemaObject(string $key, SchemaObject $schemaObject): self
    {
        $this->componentsObject['schemas'][$key] = $schemaObject->getObject();
        return $this;
    }

    public function addResponseObject(string $key, ResponseObject $responseObject): self
    {
        $this->componentsObject['responses'][$key] = $responseObject->getObject();
        return $this;
    }

    public function addParameterObject(string $key, ParameterObject $parameterObject): self
    {
        $this->componentsObject['parameters'][$key] = $parameterObject->getObject();
        return $this;
    }

    public function addExampleObject(string $key, ExampleObject $exampleObject): self
    {
        $this->componentsObject['examples'][$key] = $exampleObject->getObject();
        return $this;
    }

    public function addRequestBodyObject(string $key, RequestBodyObject $requestBodyObject): self
    {
        $this->componentsObject['requestBodies'][$key] = $requestBodyObject->getObject();
        return $this;
    }

    public function addHeaderObject(string $key, HeaderObject $headerObject): self
    {
        $this->componentsObject['headers'][$key] = $headerObject->getObject();
        return $this;
    }

    public function addSecuritySchemeObject(string $key, SecuritySchemeObject $securitySchemeObject): self
    {
        $this->componentsObject['securitySchemes'][$key] = $securitySchemeObject->getObject();
        return $this;
    }

    public function addLinkObject(string $key, LinkObject $linkObject): self
    {
        $this->componentsObject['links'][$key] = $linkObject->getObject();
        return $this;
    }

    public function addCallbackObject(string $key, CallbackObject $callbackObject): self
    {
        $this->componentsObject['callbacks'][$key] = $callbackObject;
        return $this;
    }

    public function addPathItemObject(string $key, PathItemObject $pathItemObject): self
    {
        $this->componentsObject['pathItems'][$key] = $pathItemObject->getObject();
        return $this;
    }

}