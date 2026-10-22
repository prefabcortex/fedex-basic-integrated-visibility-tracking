<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Dimensions;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DimensionsUnits;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DimensionsConstraint;
use Symfony\Component\Validator\Constraint;

final class DimensionsFixture
{
    public static function build(): Dimensions
    {
        return Dimensions::builder()
            ->setLength(100)
            ->setWidth(50)
            ->setHeight(30)
            ->setUnits(DimensionsUnits::CM)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Dimensions */
    public static function reader(): callable
    {
        return Dimensions::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DimensionsConstraint::constraints();
    }
}
