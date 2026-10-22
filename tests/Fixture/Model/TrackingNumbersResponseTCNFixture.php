<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumbersResponseTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumbersResponseTCNConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingNumbersResponseTCNFixture
{
    public static function build(): TrackingNumbersResponseTCN
    {
        $alert = Alert::builder()->build();

        return TrackingNumbersResponseTCN::builder()
            ->setAlerts([$alert])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingNumbersResponseTCN */
    public static function reader(): callable
    {
        return TrackingNumbersResponseTCN::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingNumbersResponseTCNConstraint::constraints();
    }
}
