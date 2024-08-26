<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;
use Bayfront\Validator\Validate;

/**
 * See: https://swagger.io/specification/#oauth-flow-object
 */
class OAuthFlowObject extends ObjectMethods
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

        if (!Validate::url(Arr::get($this->object, 'authorizationUrl', ''))) {
            throw new OpenApiException('Invalid OAuthFlowObject authorizationUrl');
        }

        if (!Validate::url(Arr::get($this->object, 'tokenUrl', ''))) {
            throw new OpenApiException('Invalid OAuthFlowObject tokenUrl');
        }

        if (!is_array(Arr::get($this->object, 'scopes'))) {
            throw new OpenApiException('Invalid OAuthFlowObject scopes value');
        }

    }

    /**
     * @return string
     */
    public function getAuthorizationUrl(): string
    {
        return Arr::get($this->object, 'authorizationUrl', '');
    }

    /**
     * @return string
     */
    public function getTokenUrl(): string
    {
        return Arr::get($this->object, 'tokenUrl', '');
    }

    /**
     * @return string
     */
    public function getRefreshUrl(): string
    {
        return Arr::get($this->object, 'refreshUrl', '');
    }

    /**
     * @return array
     */
    public function getScopes(): array
    {
        return Arr::get($this->object, 'scopes', []);
    }

}