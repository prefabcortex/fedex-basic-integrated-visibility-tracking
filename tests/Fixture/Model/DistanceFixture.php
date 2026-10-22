<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Distance;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DistanceUnits;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DistanceConstraint;
use Symfony\Component\Validator\Constraint;

final class DistanceFixture
{
    public static function build(): Distance
    {
        return Distance::builder()
            ->setUnits(DistanceUnits::KM)
            ->setValue(685.7)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Distance */
    public static function reader(): callable
    {
        return Distance::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DistanceConstraint::constraints();
    }
}
