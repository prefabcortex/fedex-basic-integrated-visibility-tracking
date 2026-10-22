<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PagingDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PagingDetailsConstraint;
use Symfony\Component\Validator\Constraint;

final class PagingDetailsFixture
{
    public static function build(): PagingDetails
    {
        return PagingDetails::builder()
            ->setResultsPerPage(56)
            ->setPagingToken('38903279038')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): PagingDetails */
    public static function reader(): callable
    {
        return PagingDetails::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PagingDetailsConstraint::constraints();
    }
}
