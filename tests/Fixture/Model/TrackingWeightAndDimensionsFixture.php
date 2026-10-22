<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingWeightAndDimensions;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingWeightAndDimensionsConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingWeightAndDimensionsFixture
{
    public static function build(): TrackingWeightAndDimensions
    {
        return TrackingWeightAndDimensions::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingWeightAndDimensions */
    public static function reader(): callable
    {
        return TrackingWeightAndDimensions::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingWeightAndDimensionsConstraint::constraints();
    }
}
