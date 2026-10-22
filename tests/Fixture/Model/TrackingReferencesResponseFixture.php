<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingReferencesResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingReferencesResponseConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingReferencesResponseFixture
{
    public static function build(): TrackingReferencesResponse
    {
        $alert = Alert::builder()->build();

        return TrackingReferencesResponse::builder()
            ->setAlerts([$alert])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingReferencesResponse */
    public static function reader(): callable
    {
        return TrackingReferencesResponse::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingReferencesResponseConstraint::constraints();
    }
}
