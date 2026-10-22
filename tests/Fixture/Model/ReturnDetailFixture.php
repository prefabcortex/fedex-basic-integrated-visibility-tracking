<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReturnDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ReturnDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class ReturnDetailFixture
{
    public static function build(): ReturnDetail
    {
        return ReturnDetail::builder()
            ->setAuthorizationName('Sammy Smith')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ReturnDetail */
    public static function reader(): callable
    {
        return ReturnDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ReturnDetailConstraint::constraints();
    }
}
