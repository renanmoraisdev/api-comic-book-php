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

use Pimple\Container;
use Slim\Exception\NotFoundException;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

/**
 * Class PhpErrorProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class NotFoundProvider extends ErrorProvider
{
    /**
     * @return string
     */
    public function name(): string
    {
        return 'notFoundHandler';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        return function (Container $container) {
            return function (Request $request, Response $response) use ($container) {
                $uri = urldecode($request->getUri());
                $method = $request->getMethod();
                $status = StatusCode::HTTP_NOT_FOUND;
                $error = [
                    'code' => 0,
                    'type' => 'danger',
                    'name' => NotFoundException::class,
                    'route' => "({$method}) {$uri}",
                    'status' => $status,
                    'method' => $method,
                    'message' => 'Error 404 (Not Found)',
                ];

                if ($this->isResponseJson($request) || !$container->offsetExists('view')) {
                    return $response->withJson(['error' => $error], $status);
                }

                return $container['view']->render($response, '@error.404', $error, $status);
            };
        };
    }
}
