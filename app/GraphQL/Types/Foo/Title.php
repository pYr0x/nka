<?php

namespace App\GraphQL\Types\Foo;

final class Title
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $foo = "bar";
        return $foo;
        // TODO implement the resolver
    }
}
