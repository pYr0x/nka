<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Auth;

final class User
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Auth::user();
    }
}
