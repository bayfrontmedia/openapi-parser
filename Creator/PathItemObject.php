<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;

class PathItemObject
{

    private array $pathItemObject = [];

    public function getObject(): array
    {
        return Arr::order($this->pathItemObject, [
            '$ref',
            'summary',
            'description',
            'get',
            'put',
            'post',
            'delete',
            'options',
            'head',
            'patch',
            'trace',
            'servers',
            'parameters'
        ]);
    }

    public function ref(string $value): self
    {
        $this->pathItemObject['$ref'] = $value;
        return $this;
    }

    public function summary(string $value): self
    {
        $this->pathItemObject['summary'] = $value;
        return $this;
    }

    public function description(string $value): self
    {
        $this->pathItemObject['description'] = $value;
        return $this;
    }

    public function get(OperationObject $operationObject): self
    {
        $this->pathItemObject['get'] = $operationObject->getObject();
        return $this;
    }

    public function put(OperationObject $operationObject): self
    {
        $this->pathItemObject['put'] = $operationObject->getObject();
        return $this;
    }

    public function post(OperationObject $operationObject): self
    {
        $this->pathItemObject['post'] = $operationObject->getObject();
        return $this;
    }

    public function delete(OperationObject $operationObject): self
    {
        $this->pathItemObject['delete'] = $operationObject->getObject();
        return $this;
    }

    public function options(OperationObject $operationObject): self
    {
        $this->pathItemObject['options'] = $operationObject->getObject();
        return $this;
    }

    public function head(OperationObject $operationObject): self
    {
        $this->pathItemObject['head'] = $operationObject->getObject();
        return $this;
    }

    public function patch(OperationObject $operationObject): self
    {
        $this->pathItemObject['patch'] = $operationObject->getObject();
        return $this;
    }

    public function trace(OperationObject $operationObject): self
    {
        $this->pathItemObject['trace'] = $operationObject->getObject();
        return $this;
    }

    public function addServerObject(ServerObject $serverObject): self
    {
        $this->pathItemObject['servers'][] = $serverObject->getObject();
        return $this;
    }

    public function addParameterObject(ParameterObject $parameterObject): self
    {
        $this->pathItemObject['parameters'][] = $parameterObject->getObject();
        return $this;
    }

}