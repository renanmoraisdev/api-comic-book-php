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

use Core\Env;
use Core\Password\PasswordFactory;

/**
 * Class PasswordProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class PasswordProvider extends Provider
{
    /**
     * @return string
     */
    public function name(): string
    {
        return 'hash';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function () {
            return PasswordFactory::create(
                Env::get('APP_PASSWORD_DRIVER', 'bcrypt')
            );
        };
    }
}
