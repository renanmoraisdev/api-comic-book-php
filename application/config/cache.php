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

use Core\Env;
use Core\Helpers\Path;

return [
    /*
     * Default cache store
     *
     * Supported: "redis", "file", "apc"
     *
     * If you want the redis driver, you must install the dependency
     *
     * composer require predis/predis
     */

    'default' => Env::get('CACHE_DRIVER', 'file'),

    'stores' => [
        'file' => [
            'path' => Path::storage('/cache/app'),
            'permission' => 0755,
        ],

        'redis' => [
            /*
             * Observation:
             *
             * If the [url] variable is set, the other variables will not be used
             */

            'url' => Env::get('REDIS_URL'),

            'host' => Env::get('REDIS_HOST', '127.0.0.1'),
            'port' => Env::get('REDIS_PORT', 6379),
            'password' => Env::get('REDIS_PASSWORD'),
            'database' => Env::get('REDIS_DATABASE_CACHE', '1'),
        ],
    ],
];
