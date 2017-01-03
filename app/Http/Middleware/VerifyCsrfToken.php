<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    protected $except = [
      'sapi/v1/login', 'sapi/v1/user/profile',
    ];
}
