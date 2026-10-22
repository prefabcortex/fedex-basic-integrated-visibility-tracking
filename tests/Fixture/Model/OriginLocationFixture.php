<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\OriginLocation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\OriginLocationConstraint;
use Symfony\Component\Validator\Constraint;

final class OriginLocationFixture
{
    public static function build(): OriginLocation
    {
        return OriginLocation::builder()
            ->setLocationId('SEA')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): OriginLocation */
    public static function reader(): callable
    {
        return OriginLocation::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return OriginLocationConstraint::constraints();
    }
}
