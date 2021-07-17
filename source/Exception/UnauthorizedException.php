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

namespace Core\Exception;

/**
 * Class UnauthorizedException.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class UnauthorizedException extends Exception
{
    /**
     * UnauthorizedException constructor.
     *
     * @param string|null $message
     * @param int         $statusCode
     */
    public function __construct(string $message = 'Unauthorized', int $statusCode = 401)
    {
        parent::__construct($message, E_USER_ERROR, $statusCode);
    }
}
