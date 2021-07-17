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

use Core\Cache\Cache;
use Core\Config;

/**
 * Class CacheProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class CacheProvider extends Provider
{
    /**
     * @return string|array
     */
    public function name()
    {
        return 'cache';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function () {
            return new Cache(Config::get('cache'));
        };
    }
}
