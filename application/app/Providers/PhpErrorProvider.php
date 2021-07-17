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

/**
 * Class PhpErrorProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class PhpErrorProvider extends ErrorProvider
{
    /**
     * @return string
     */
    public function name(): string
    {
        return 'phpErrorHandler';
    }
}
