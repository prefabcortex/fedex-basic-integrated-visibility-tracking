<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingMPSResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingMPSResponseConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingMPSResponseFixture
{
    public static function build(): TrackingMPSResponse
    {
        $alert = Alert::builder()->build();

        return TrackingMPSResponse::builder()
            ->setAlerts([$alert])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingMPSResponse */
    public static function reader(): callable
    {
        return TrackingMPSResponse::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingMPSResponseConstraint::constraints();
    }
}
