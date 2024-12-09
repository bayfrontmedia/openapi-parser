<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class OperationObject
{

    private array $operationObject = [];

    public function getObject(): array
    {
        return Arr::order($this->operationObject, [
            'tags',
            'summary',
            'description',
            'externalDocs',
            'operationId',
            'parameters',
            'requestBody',
            'responses',
            'callbacks',
            'depreciated',
            'security',
            'servers'
        ]);
    }

    public function tags(array $tags): self
    {
        $this->operationObject['tags'] = $tags;
        return $this;
    }

    public function summary(string $value): self
    {
        $this->operationObject['summary'] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->operationObject['description'] = $value;
        return $this;
    }

    public function externalDocs(ExternalDocumentationObject $externalDocumentationObject): self
    {
        $this->operationObject['externalDocs'] = $externalDocumentationObject->getObject();
        return $this;
    }

    public function operationId(string $value): self
    {
        $this->operationObject['operationId'] = $value;
        return $this;
    }

    public function addParameterObject(ParameterObject $parameterObject): self
    {
        $this->operationObject['parameters'][] = $parameterObject->getObject();
        return $this;
    }

    public function requestBody(RequestBodyObject $requestBodyObject): self
    {
        $this->operationObject['requestBody'] = $requestBodyObject->getObject();
        return $this;
    }

    public function responses(ResponsesObject $responsesObject): self
    {
        $this->operationObject['responses'] = $responsesObject->getObject();
        return $this;
    }

    public function addCallbackObject(CallbackObject $callbackObject): self
    {
        $this->operationObject['callbacks'][] = $callbackObject->getObject();
        return $this;
    }

    public function depreciated(bool $value): self
    {
        $this->operationObject['depreciated'] = $value;
        return $this;
    }

    public function addSecurityRequirementObject(SecurityRequirementObject $securityRequirementObject): self
    {
        $this->operationObject['security'][] = $securityRequirementObject->getObject();
        return $this;
    }

    public function addServerObject(ServerObject $serverObject): self
    {
        $this->operationObject['servers'][] = $serverObject->getObject();
        return $this;
    }

}