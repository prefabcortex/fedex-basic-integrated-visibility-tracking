<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AdditionalTrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AdditionalTrackingInfoConstraint;
use Symfony\Component\Validator\Constraint;

final class AdditionalTrackingInfoFixture
{
    public static function build(): AdditionalTrackingInfo
    {
        return AdditionalTrackingInfo::builder()
            ->setHasAssociatedShipments(false)
            ->setNickname('shipment nickname')
            ->setShipmentNotes('shipment notes')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): AdditionalTrackingInfo */
    public static function reader(): callable
    {
        return AdditionalTrackingInfo::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AdditionalTrackingInfoConstraint::constraints();
    }
}
