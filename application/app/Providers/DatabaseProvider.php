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
use Core\Database\Database;
use Core\Database\Model;

/**
 * Class DatabaseProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class DatabaseProvider extends Provider
{
    /**
     * @return array
     */
    public function name(): array
    {
        return ['db', 'database'];
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function () {
            // Connect instance
            $database = new Database();
            $database->setDefaultDriver(Config::get('database.default', 'mysql'));

            // Add connections config
            foreach (Config::get('database.connections') as $driver => $config) {
                $database->addConnection($driver, $config);
            }

            return $database->connection();
        };
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        Model::setDatabase($this->database);
    }
}
