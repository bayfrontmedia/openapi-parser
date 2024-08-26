<?php

namespace Bayfront\OpenApi\Interfaces;

use Bayfront\OpenApi\Exceptions\OpenApiException;

interface ObjectInterface
{

    /**
     * Get object.
     *
     * @return array
     */
    public function getObject(): array;

    /**
     * Validate OpenAPI specification of an object.
     *
     * @return void
     * @throws OpenApiException
     */
    public function validate(): void;

}