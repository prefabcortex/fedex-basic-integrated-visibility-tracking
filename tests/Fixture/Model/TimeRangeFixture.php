<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeRange;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TimeRangeConstraint;
use Symfony\Component\Validator\Constraint;

final class TimeRangeFixture
{
    public static function build(): TimeRange
    {
        return TimeRange::builder()
            ->setBegins('2021-10-01T08:00:00')
            ->setEnds('2021-10-15T00:00:00-06:00')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TimeRange */
    public static function reader(): callable
    {
        return TimeRange::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TimeRangeConstraint::constraints();
    }
}
