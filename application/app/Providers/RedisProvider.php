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

namespace App\Providers;

use Core\Config;
use Core\Redis;

/**
 * Class RedisProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class RedisProvider extends Provider
{
    /**
     * @return string|array
     */
    public function name()
    {
        return 'redis';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function () {
            return new Redis(Config::get('redis'));
        };
    }
}
