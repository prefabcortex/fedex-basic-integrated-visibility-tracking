<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PagingDetails2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PagingDetails2Constraint;
use Symfony\Component\Validator\Constraint;

final class PagingDetails2Fixture
{
    public static function build(): PagingDetails2
    {
        return PagingDetails2::builder()
            ->setResultsPerPage(56)
            ->setPagingToken('38903279038')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): PagingDetails2 */
    public static function reader(): callable
    {
        return PagingDetails2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PagingDetails2Constraint::constraints();
    }
}
