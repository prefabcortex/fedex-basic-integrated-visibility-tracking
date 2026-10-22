<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumberInfoConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingNumberInfoFixture
{
    public static function build(): TrackingNumberInfo
    {
        return TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingNumberInfo */
    public static function reader(): callable
    {
        return TrackingNumberInfo::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingNumberInfoConstraint::constraints();
    }
}
