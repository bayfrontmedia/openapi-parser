<?php

namespace Bayfront\OpenApi\Abstracts;

use Bayfront\OpenApi\Interfaces\ObjectInterface;

abstract class ObjectMethods implements ObjectInterface
{

    protected array $object;

    public function __construct(array $object)
    {
        $this->object = $object;
    }

    /**
     * @inheritDoc
     */
    public function getObject(): array
    {
        return $this->object;
    }

}