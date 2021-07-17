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

use Closure;

/**
 * Class ServiceProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
interface ServiceProvider
{
    /**
     * @return string|array
     */
    public function name();

    /**
     * @return \Closure
     */
    public function register(): Closure;
}
