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

namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class TrailingSlashMiddleware.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class TrailingSlashMiddleware extends Middleware
{
    /**
     * @param \Slim\Http\Request  $request  PSR7 request
     * @param \Slim\Http\Response $response PSR7 response
     * @param callable            $next     Next middleware
     *
     * @return \Slim\Http\Response
     */
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $uri = $request->getUri();
        $path = $uri->getPath();

        if ('/' != $path && '/' == substr($path, -1)) {
            while ('/' == substr($path, -1)) {
                $path = substr($path, 0, -1);
            }

            $uri = $uri->withPath($path);

            if ('GET' == $request->getMethod()) {
                return $response->withRedirect($uri, 301);
            }

            $request = $request->withUri($uri);
        }

        return $next($request, $response);
    }
}
