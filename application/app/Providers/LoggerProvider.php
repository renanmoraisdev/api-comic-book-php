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

use Core\Helpers\Path;
use Core\Logger;

/**
 * Class LoggerProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class LoggerProvider extends Provider
{
    /**
     * @return string
     */
    public function name(): string
    {
        return 'logger';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function () {
            return new Logger('app', Path::storage('/logs'));
        };
    }
}
