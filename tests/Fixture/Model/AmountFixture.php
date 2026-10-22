<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Amount;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AmountConstraint;
use Symfony\Component\Validator\Constraint;

final class AmountFixture
{
    public static function build(): Amount
    {
        return Amount::builder()
            ->setCurrency('USD')
            ->setValue(56.8)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Amount */
    public static function reader(): callable
    {
        return Amount::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AmountConstraint::constraints();
    }
}
