<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumbersResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumbersResponseConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingNumbersResponseFixture
{
    public static function build(): TrackingNumbersResponse
    {
        $alert = Alert::builder()->build();

        return TrackingNumbersResponse::builder()
            ->setAlerts([$alert])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingNumbersResponse */
    public static function reader(): callable
    {
        return TrackingNumbersResponse::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingNumbersResponseConstraint::constraints();
    }
}
