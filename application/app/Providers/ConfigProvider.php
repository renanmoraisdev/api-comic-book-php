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

/**
 * Class ConfigProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class ConfigProvider extends Provider
{
    /**
     * @return string|array
     */
    public function name()
    {
        return 'config';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function () {
            return new Config();
        };
    }
}
