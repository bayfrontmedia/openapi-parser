<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;
use Bayfront\Validator\Rules\Url;

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

        $authUrl = new Url(Arr::get($this->object, 'authorizationUrl', ''));

        if (!$authUrl->isValid()) {
            throw new OpenApiException('Invalid OAuthFlowObject authorizationUrl');
        }

        $tokenUrl = new Url(Arr::get($this->object, 'tokenUrl', ''));

        if (!$tokenUrl->isValid()) {
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