<?php

/**
 * Vonage Client Library for PHP
 *
 * @copyright Copyright (c) 2016-2020 Vonage, Inc. (http://vonage.com)
 * @license https://github.com/Vonage/vonage-php-sdk-core/blob/master/LICENSE.txt Apache License 2.0
 */

declare(strict_types=1);

namespace Vonage\Account;

use ArrayAccess;
use Vonage\Client\Exception\Exception as ClientException;
use Vonage\InvalidResponseException;

use function get_class;
use function trigger_error;

/**
 * @deprecated Use the Vonage\Secrets\Secret object instead
 */
class Secret implements ArrayAccess
{
    protected $data;

    /**
     * @throws InvalidResponseException
     */
    public function __construct(array $data)
    {
        if (!isset($data['id'])) {
            throw new InvalidResponseException("Missing key: 'id'");
        }

        if (!isset($data['created_at'])) {
            throw new InvalidResponseException("Missing key: 'created_at'");
        }

        $this->data = $data;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function getCreatedAt()
    {
        return $this->data['created_at'];
    }

    public function getLinks()
    {
        return $this->data['_links'];
    }

    /**
     * @throws InvalidResponseException
     *
     * @deprecated Instantiate the object directly
     */
    public static function fromApi(array $data): self
    {
        trigger_error('Please instantiate a Vonage\Account\Secret object instead of using fromApi', E_USER_DEPRECATED);

        return new self($data);
    }

    public function offsetExists($offset): bool
    {
        trigger_error(
            "Array access for " . get_class($this) . " is deprecated, please use getter methods",
            E_USER_DEPRECATED
        );

        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        trigger_error(
            "Array access for " . get_class($this) . " is deprecated, please use getter methods",
            E_USER_DEPRECATED
        );

        return $this->data[$offset];
    }

    /**
     * @throws ClientException
     */
    public function offsetSet($offset, $value): void
    {
        throw new ClientException('Secret::offsetSet is not implemented');
    }

    /**
     * @throws ClientException
     */
    public function offsetUnset($offset): void
    {
        throw new ClientException('Secret::offsetUnset is not implemented');
    }

    /**
     * @noinspection MagicMethodsValidityInspection
     */
    public function __get($key): ?array
    {
        if ($key === 'data') {
            trigger_error(
                "Direct access to " . get_class($this) . "::data is deprecated, please use getter to toArray() methods",
                E_USER_DEPRECATED
            );

            return $this->data;
        }

        return null;
    }
}
