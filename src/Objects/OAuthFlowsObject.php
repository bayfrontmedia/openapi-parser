<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;

/**
 * See: https://swagger.io/specification/#oauth-flows-object
 */
class OAuthFlowsObject extends ObjectMethods
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

    }

    /**
     * @return OAuthFlowObject|null
     */
    public function getImplicit(): ?OAuthFlowObject
    {

        if (is_array(Arr::get($this->object, 'implicit'))) {
            return new OAuthFlowObject(Arr::get($this->object, 'implicit'));
        }

        return null;

    }

    /**
     * @return OAuthFlowObject|null
     */
    public function getPassword(): ?OAuthFlowObject
    {

        if (is_array(Arr::get($this->object, 'password'))) {
            return new OAuthFlowObject(Arr::get($this->object, 'password'));
        }

        return null;

    }

    /**
     * @return OAuthFlowObject|null
     */
    public function getClientCredentials(): ?OAuthFlowObject
    {

        if (is_array(Arr::get($this->object, 'clientCredentials'))) {
            return new OAuthFlowObject(Arr::get($this->object, 'clientCredentials'));
        }

        return null;

    }

    /**
     * @return OAuthFlowObject|null
     */
    public function getAuthorizationCode(): ?OAuthFlowObject
    {

        if (is_array(Arr::get($this->object, 'authorizationCode'))) {
            return new OAuthFlowObject(Arr::get($this->object, 'authorizationCode'));
        }

        return null;

    }

}