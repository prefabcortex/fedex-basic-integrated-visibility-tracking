<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AlertConstraint;
use Symfony\Component\Validator\Constraint;

final class AlertFixture
{
    public static function build(): Alert
    {
        return Alert::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): Alert */
    public static function reader(): callable
    {
        return Alert::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AlertConstraint::constraints();
    }
}
