<?php

/*
 * API Comic Book
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 * @author Renan Morais <renankabum@gmail.com>
 * @link https://github.com/vagnercardosoweb
 * @link https://github.com/renanmoraisdev
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2021 Vagner Cardoso
 * @copyright 2021 Renan Morais
 */

namespace Core\Interfaces;

/**
 * Class CacheStore.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
interface CacheStore
{
    /**
     * @param string $key
     * @param mixed  $default
     * @param int    $seconds
     *
     * @return mixed
     */
    public function get(string $key, $default = null, int $seconds = 0);

    /**
     * @param string $key
     * @param mixed  $value
     * @param int    $seconds
     *
     * @return mixed
     */
    public function set(string $key, $value, int $seconds = 0): bool;

    /**
     * @return bool
     */
    public function flush(): bool;

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * @param string $key
     * @param int    $value
     *
     * @return mixed
     */
    public function increment(string $key, $value = 1): bool;

    /**
     * @param string $key
     * @param int    $value
     *
     * @return mixed
     */
    public function decrement(string $key, $value = 1): bool;

    /**
     * @param string|array $key
     *
     * @return bool
     */
    public function delete($key): bool;
}
