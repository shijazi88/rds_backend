<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateDriver extends Middleware
{
    /**
     * Determine if the user is a driver.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('driver')->check()) {
            return $this->auth->shouldUse('driver');
        }

        $this->unauthenticated($request, ['driver']);
    }
}
