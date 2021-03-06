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
 * Class PostgreSqlConnection.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class PostgreSqlConnection extends Connection
{
    /**
     * @param array $config
     *
     * @return string
     */
    protected function getDsn(array $config): string
    {
        $config['port'] = $config['port'] ?? 5432;

        return "pgsql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
    }

    /**
     * @param array $config
     */
    protected function setSchema(array $config): void
    {
        if (!empty($config['schema'])) {
            if (is_string($config['schema'])) {
                $config['schema'] = explode('', $config['schema']);
            }

            $this->exec(sprintf(
                'SET search_path TO %s',
                implode(', ', array_map([$this, 'quote'], $config['schema']))
            ));
        }
    }

    /**
     * @param array $config
     */
    protected function setEncoding(array $config): void
    {
        if (!empty($config['charset'])) {
            $this->exec("SET client_encoding TO {$this->quote(strtoupper($config['charset']))}");
        }
    }

    /**
     * @param array $config
     */
    protected function setTimezone(array $config): void
    {
        if (!empty($config['timezone'])) {
            $this->exec("SET timezone TO {$this->quote($config['timezone'])}");
        }
    }
}
