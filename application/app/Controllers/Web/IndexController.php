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

namespace App\Controllers\Web;

use App\Controllers\Controller;
use Slim\Http\Response;

/**
 * Class IndexController.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class IndexController extends Controller
{
    /**
     * @throws \Exception
     *
     * @return \Slim\Http\Response
     */
    public function index(): Response
    {
        return $this->json([
            'project' => 'API Comic Book',
            'version' => '1.0.0',
            'license' => 'MIT',
            'author' => [
                'name' => 'Renan Morais',
                'email' => 'renankabum@gmail.com',
            ],
        ]);
    }
}
