<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingDateAndTime;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingDateAndTimeType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingDateAndTimeConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingDateAndTimeFixture
{
    public static function build(): TrackingDateAndTime
    {
        return TrackingDateAndTime::builder()
            ->setDateTime('2007-09-27T00:00:00')
            ->setType(TrackingDateAndTimeType::ACTUAL_DELIVERY)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingDateAndTime */
    public static function reader(): callable
    {
        return TrackingDateAndTime::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingDateAndTimeConstraint::constraints();
    }
}
