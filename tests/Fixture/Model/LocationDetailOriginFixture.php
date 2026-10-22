<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetailOrigin;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetailOriginConstraint;
use Symfony\Component\Validator\Constraint;

final class LocationDetailOriginFixture
{
    public static function build(): LocationDetailOrigin
    {
        return LocationDetailOrigin::builder()
            ->setLocationId('SEA')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): LocationDetailOrigin */
    public static function reader(): callable
    {
        return LocationDetailOrigin::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return LocationDetailOriginConstraint::constraints();
    }
}
