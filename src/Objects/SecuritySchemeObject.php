<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi\Objects;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\OpenApi\Abstracts\ObjectMethods;
use Bayfront\OpenApi\Exceptions\OpenApiException;

/**
 * See: https://swagger.io/specification/#security-scheme-object
 */
class SecuritySchemeObject extends ObjectMethods
{

    public function __construct(array $object)
    {
        parent::__construct($object);
    }

    public const TYPE_APIKEY = 'apiKey';
    public const TYPE_HTTP = 'http';
    public const TYPE_MUTUALTLS = 'mutualTLS';
    public const TYPE_OAUTH2 = 'oauth2';
    public const TYPE_OPENIDCONNECT = 'openIdConnect';

    public const IN_QUERY = 'query';
    public const IN_HEADER = 'header';
    public const IN_COOKIE = 'cookie';

    /**
     * @inheritDoc
     */
    public function validate(): void
    {

        if (!in_array(Arr::get($this->object, 'type', ''), [
            self::TYPE_APIKEY,
            self::TYPE_HTTP,
            self::TYPE_MUTUALTLS,
            self::TYPE_OAUTH2,
            self::TYPE_OPENIDCONNECT
        ])) {
            throw new OpenApiException('Invalid SecuritySchemeObject type');
        }

        if (!is_string(Arr::get($this->object, 'name'))) {
            throw new OpenApiException('Invalid SecuritySchemeObject name');
        }

        if (!in_array(Arr::get($this->object, 'in', ''), [
            self::IN_QUERY,
            self::IN_HEADER,
            self::IN_COOKIE
        ])) {
            throw new OpenApiException('Invalid SecuritySchemeObject in value');
        }

        if (!is_string(Arr::get($this->object, 'scheme'))) {
            throw new OpenApiException('Invalid SecuritySchemeObject scheme');
        }

        if (!is_array(Arr::get($this->object, 'flows'))) {
            throw new OpenApiException('Invalid SecuritySchemeObject flows value');
        }

        if (!is_string(Arr::get($this->object, 'openIdConnectUrl'))) {
            throw new OpenApiException('Invalid SecuritySchemeObject openIdConnectUrl');
        }

    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return Arr::get($this->object, 'type', '');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return Arr::get($this->object, 'description', '');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return Arr::get($this->object, 'name', '');
    }

    /**
     * @return string
     */
    public function getIn(): string
    {
        return Arr::get($this->object, 'in', '');
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return Arr::get($this->object, 'scheme', '');
    }

    /**
     * @return string
     */
    public function getBearerFormat(): string
    {
        return Arr::get($this->object, 'bearerFormat', '');
    }

    /**
     * @return OAuthFlowsObject|null
     */
    public function getFlows(): ?OAuthFlowsObject
    {

        if (is_array(Arr::get($this->object, 'flows'))) {
            return new OAuthFlowsObject(Arr::get($this->object, 'flows'));
        }

        return null;

    }

    /**
     * @return string
     */
    public function getOpenIdConnectUrl(): string
    {
        return Arr::get($this->object, 'openIdConnectUrl', '');
    }

}