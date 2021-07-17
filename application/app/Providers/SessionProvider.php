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

use Core\Env;
use Core\Session\Session;

/**
 * Class SessionProvider.
 *
 * @author Vagner Cardoso <vagnercardosoweb@gmail.com>
 */
class SessionProvider extends Provider
{
    /**
     * @return string
     */
    public function name(): string
    {
        return 'session';
    }

    /**
     * @return \Closure
     */
    public function register(): \Closure
    {
        $session = null;

        if (true === Env::get('APP_SESSION', false)) {
            $session = new Session();

            if ($this->view) {
                $this->view->addGlobal('session', $session);
            }
        }

        return function () use ($session) {
            return $session;
        };
    }
}
