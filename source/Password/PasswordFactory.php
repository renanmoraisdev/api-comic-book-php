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

namespace Core\Password;

/**
 * Class PasswordFactory.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
final class PasswordFactory
{
    /**
     * @param string|null $driver
     *
     * @return \Core\Password\Password
     */
    public static function create(string $driver = null): Password
    {
        if ('argon' === $driver) {
            return new Argon();
        }

        if ('argon2id' === $driver) {
            return new Argon2Id();
        }

        return new Bcrypt();
    }
}
