<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Weight;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\WeightUnit;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\WeightConstraint;
use Symfony\Component\Validator\Constraint;

final class WeightFixture
{
    public static function build(): Weight
    {
        return Weight::builder()
            ->setUnit(WeightUnit::LB)
            ->setValue('22222.0')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Weight */
    public static function reader(): callable
    {
        return Weight::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return WeightConstraint::constraints();
    }
}
