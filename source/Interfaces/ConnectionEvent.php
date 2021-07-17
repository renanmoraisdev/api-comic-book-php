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

use PDO;

/**
 * Class ConnectionEvent.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
interface ConnectionEvent
{
    /**
     * @param \PDO $pdo
     *
     * @return mixed
     */
    public function __invoke(PDO $pdo);
}
