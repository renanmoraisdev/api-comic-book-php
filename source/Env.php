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

namespace Core;

use Core\Helpers\Helper;
use Core\Helpers\Path;
use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\ApacheAdapter;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\Adapter\ServerConstAdapter;
use Dotenv\Repository\RepositoryBuilder;
use Dotenv\Repository\RepositoryInterface;

/**
 * Class Env.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class Env
{
    /**
     * @var \Dotenv\Repository\RepositoryInterface
     */
    protected static $repository;

    /**
     * @param string|string[]|null $name
     *
     * @return array<string|string|null>
     */
    public static function load($name = '.env'): ?array
    {
        $envPath = dirname(self::path());

        return Dotenv::create(self::repository(), $envPath, $name)->load();
    }

    /**
     * @return string
     */
    public static function path(): string
    {
        $env = Path::app('/.env');
        $example = Path::app('/.env.example');

        if (!file_exists($env) && file_exists($example)) {
            file_put_contents($env, file_get_contents($example));
        }

        return $env;
    }

    /**
     * @return \Dotenv\Repository\RepositoryInterface
     */
    protected static function repository(): RepositoryInterface
    {
        if (null === self::$repository) {
            $repository = RepositoryBuilder::createWithNoAdapters();

            foreach (self::adapters() as $adapter) {
                $repository = $repository->addWriter($adapter);
                $repository = $repository->addAdapter($adapter);
            }

            self::$repository = $repository->immutable()->make();
        }

        return self::$repository;
    }

    /**
     * @return array
     */
    protected static function adapters(): array
    {
        return [
            ServerConstAdapter::class,
            EnvConstAdapter::class,
            PutenvAdapter::class,
            ApacheAdapter::class,
        ];
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        if (!$value = self::repository()->get($key)) {
            return $default;
        }

        $value = Helper::normalizeValueType($value);

        if (preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)) {
            return $matches[2];
        }

        return is_string($value) ? trim($value) : $value;
    }
}
