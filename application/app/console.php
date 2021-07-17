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

use Core\App;
use Core\Config;

// Autoload.
$autoload = APP_FOLDER.'/vendor/autoload.php';

if (!file_exists($autoload)) {
    exit('composer not installed');
}

require_once "{$autoload}";

// Loader app
$app = App::getInstance();
$app->registerProviders();
$app->registerMiddleware();
$routes = Config::get('app.routes.console', []);
$app->registerRoutes($routes);
$app->registerEvents();
$app->run();
