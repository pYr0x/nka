<?php

namespace App\GraphQL\Queries;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class Foo
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke(mixed $root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): string
    {
//        if ($this->errorConditionIsMet()) {
//            throw new CustomException(
//                'This is the error message',
//                'The reason why this error was thrown, is rendered in the extension output.'
//            );
//        }

        return 'Success!';
    }
}
