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

namespace Core\Database\Connection;

/**
 * Class MySqlConnection.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class MySqlConnection extends Connection
{
    /**
     * @param array $config
     *
     * @return string
     */
    protected function getDsn(array $config): string
    {
        if (!empty($config['unix_socket'])) {
            return "mysql:unix_socket={$config['unix_socket']};dbname={$config['database']}";
        }

        $config['port'] = $config['port'] ?? 3306;

        return "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
    }

    /**
     * @param array $config
     */
    protected function setSchema(array $config): void
    {
        if (!empty($config['database'])) {
            $this->exec("USE {$config['database']};");
        }
    }

    /**
     * @param array $config
     */
    protected function setEncoding(array $config): void
    {
        if (!empty($config['charset'])) {
            $encoding = "SET NAMES {$this->quote($config['charset'])}";
            $encoding .= (!empty($config['collation']) ? " COLLATE {$this->quote($config['collation'])}" : '');
            $this->exec("{$encoding};");
        }
    }

    /**
     * @param array $config
     */
    protected function setTimezone(array $config): void
    {
        if (!empty($config['timezone'])) {
            $this->exec("SET time_zone = {$this->quote($config['timezone'])};");
        }
    }
}
