<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Exceptions\OpenApiException;

class ParameterObject
{

    private array $parameterObject = [];

    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_PATH = 'path';
    public const IN_COOKIE = 'cookie';

    public function __construct(string $name, string $in)
    {
        $this->parameterObject['name'] = $name;
        $this->parameterObject['in'] = $in;
    }

    public function getObject(): array
    {
        return Arr::order($this->parameterObject, [
            'name',
            'in',
            'description',
            'required',
            'depreciated',
            'allowEmptyValue',
            'style',
            'explode',
            'allowReserved',
            'schema',
            'example',
            'examples',
            'content',
            'matrix',
            'label',
            'form',
            'simple',
            'spaceDelimited',
            'pipeDelimited',
            'deepObject'
        ]);
    }

    public function description(string $value): self
    {
        $this->parameterObject['description'] = $value;
        return $this;
    }

    public function required(bool $value): self
    {
        $this->parameterObject['required'] = $value;
        return $this;
    }

    public function depreciated(bool $value): self
    {
        $this->parameterObject['depreciated'] = $value;
        return $this;
    }

    public function allowEmptyValue(bool $value): self
    {
        $this->parameterObject['allowEmptyValue'] = $value;
        return $this;
    }

    public const STYLE_FORM = 'form';
    public const STYLE_SIMPLE = 'simple';

    public function style(string $value): self
    {
        $this->parameterObject['style'] = $value;
        return $this;
    }

    public function explode(bool $value): self
    {
        $this->parameterObject['explode'] = $value;
        return $this;
    }

    public function allowReserved(bool $value): self
    {
        $this->parameterObject['allowReserved'] = $value;
        return $this;
    }

    public function schema(SchemaObject $schemaObject): self
    {
        $this->parameterObject['schema'] = $schemaObject->getObject();
        return $this;
    }

    public function example(mixed $value): self
    {
        $this->parameterObject['example'] = $value;
        return $this;
    }

    public function addExampleObject(ExampleObject $exampleObject): self
    {
        $this->parameterObject['examples'][] = $exampleObject->getObject();
        return $this;
    }

    public function addMediaTypeObject(MediaTypeObject $mediaTypeObject): self
    {
        $this->parameterObject['content'] = $mediaTypeObject->getObject();
        return $this;
    }

    public function matrix(mixed $value): self
    {
        if ($this->parameterObject['in'] != self::IN_PATH) {
            throw new OpenApiException('Unable to define matrix: ParameterObject (in) value must equal (' . self::IN_PATH . ')');
        }

        $this->parameterObject['matrix'] = $value;
        return $this;
    }

    public function label(mixed $value): self
    {
        if ($this->parameterObject['in'] != self::IN_PATH) {
            throw new OpenApiException('Unable to define label: ParameterObject (in) value must equal (' . self::IN_PATH . ')');
        }

        $this->parameterObject['label'] = $value;
        return $this;
    }

    public function form(mixed $value): self
    {
        if ($this->parameterObject['in'] != self::IN_QUERY || $this->parameterObject['in'] != self::IN_COOKIE) {
            throw new OpenApiException('Unable to define form: ParameterObject (in) value must equal (' . self::IN_QUERY . ') or (' . self::IN_COOKIE . ')');
        }

        $this->parameterObject['form'] = $value;
        return $this;
    }

    public function simple(array $value): self
    {
        if ($this->parameterObject['in'] != self::IN_PATH || $this->parameterObject['in'] != self::IN_HEADER) {
            throw new OpenApiException('Unable to define simple: ParameterObject (in) value must equal (' . self::IN_PATH . ') or (' . self::IN_HEADER . ')');
        }

        $this->parameterObject['simple'] = $value;
        return $this;

    }

    public function spaceDelimited(mixed $value): self
    {
        if ($this->parameterObject['in'] != self::IN_QUERY) {
            throw new OpenApiException('Unable to define spaceDelimited: ParameterObject (in) value must equal (' . self::IN_QUERY . ')');
        }

        $this->parameterObject['spaceDelimited'] = $value;
        return $this;
    }

    public function pipeDelimited(mixed $value): self
    {
        if ($this->parameterObject['in'] != self::IN_QUERY) {
            throw new OpenApiException('Unable to define pipeDelimited: ParameterObject (in) value must equal (' . self::IN_QUERY . ')');
        }

        $this->parameterObject['pipeDelimited'] = $value;
        return $this;
    }

    public function deepObject(mixed $value): self
    {
        if ($this->parameterObject['in'] != self::IN_QUERY) {
            throw new OpenApiException('Unable to define deepObject: ParameterObject (in) value must equal (' . self::IN_QUERY . ')');
        }

        $this->parameterObject['deepObject'] = $value;
        return $this;
    }

}