<?php

namespace Bayfront\OpenApi\Creator;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * TODO:
 * Add validation rules
 *
 * See: https://swagger.io/specification/#header-object
 */
class HeaderObject
{

    private array $headerObject = [];

    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_PATH = 'path';
    public const IN_COOKIE = 'cookie';

    public function __construct(string $name, string $in)
    {
        $this->headerObject['name'] = $name;
        $this->headerObject['in'] = $in;
    }

    public function getObject(): array
    {
        return Arr::order($this->headerObject, [
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
        $this->headerObject['description'] = $value;
        return $this;
    }

    public function required(bool $value): self
    {
        $this->headerObject['required'] = $value;
        return $this;
    }

    public function depreciated(bool $value): self
    {
        $this->headerObject['depreciated'] = $value;
        return $this;
    }

    public function allowEmptyValue(bool $value): self
    {
        $this->headerObject['allowEmptyValue'] = $value;
        return $this;
    }

    public const STYLE_FORM = 'form';
    public const STYLE_SIMPLE = 'simple';

    public function style(string $value): self
    {
        $this->headerObject['style'] = $value;
        return $this;
    }

    public function explode(bool $value): self
    {
        $this->headerObject['explode'] = $value;
        return $this;
    }

    public function allowReserved(bool $value): self
    {
        $this->headerObject['allowReserved'] = $value;
        return $this;
    }

    public function schema(SchemaObject $schemaObject): self
    {
        $this->headerObject['schema'] = $schemaObject->getObject();
        return $this;
    }

    public function example(mixed $value): self
    {
        $this->headerObject['example'] = $value;
        return $this;
    }

    public function addExampleObject(ExampleObject $exampleObject): self
    {
        $this->headerObject['examples'][] = $exampleObject->getObject();
        return $this;
    }

    public function addMediaTypeObject(MediaTypeObject $mediaTypeObject): self
    {
        $this->headerObject['content'] = $mediaTypeObject->getObject();
        return $this;
    }

    public function matrix(mixed $value): self
    {
        if ($this->headerObject['in'] != self::IN_PATH) {
            throw new OpenApiException('Unable to define matrix: ParameterObject (in) value must equal (' . self::IN_PATH . ')');
        }

        $this->headerObject['matrix'] = $value;
        return $this;
    }

    public function label(mixed $value): self
    {
        if ($this->headerObject['in'] != self::IN_PATH) {
            throw new OpenApiException('Unable to define label: ParameterObject (in) value must equal (' . self::IN_PATH . ')');
        }

        $this->headerObject['label'] = $value;
        return $this;
    }

    public function form(mixed $value): self
    {
        if ($this->headerObject['in'] != self::IN_QUERY || $this->headerObject['in'] != self::IN_COOKIE) {
            throw new OpenApiException('Unable to define form: ParameterObject (in) value must equal (' . self::IN_QUERY . ') or (' . self::IN_COOKIE . ')');
        }

        $this->headerObject['form'] = $value;
        return $this;
    }

    public function simple(array $value): self
    {
        if ($this->headerObject['in'] != self::IN_PATH || $this->headerObject['in'] != self::IN_HEADER) {
            throw new OpenApiException('Unable to define simple: ParameterObject (in) value must equal (' . self::IN_PATH . ') or (' . self::IN_HEADER . ')');
        }

        $this->headerObject['simple'] = $value;
        return $this;

    }

    public function spaceDelimited(mixed $value): self
    {
        if ($this->headerObject['in'] != self::IN_QUERY) {
            throw new OpenApiException('Unable to define spaceDelimited: ParameterObject (in) value must equal (' . self::IN_QUERY . ')');
        }

        $this->headerObject['spaceDelimited'] = $value;
        return $this;
    }

    public function pipeDelimited(mixed $value): self
    {
        if ($this->headerObject['in'] != self::IN_QUERY) {
            throw new OpenApiException('Unable to define pipeDelimited: ParameterObject (in) value must equal (' . self::IN_QUERY . ')');
        }

        $this->headerObject['pipeDelimited'] = $value;
        return $this;
    }

    public function deepObject(mixed $value): self
    {
        if ($this->headerObject['in'] != self::IN_QUERY) {
            throw new OpenApiException('Unable to define deepObject: ParameterObject (in) value must equal (' . self::IN_QUERY . ')');
        }

        $this->headerObject['deepObject'] = $value;
        return $this;
    }

}