<?php

namespace App\GraphQL\Queries;

final class Product
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return 'world!';
    }
}
