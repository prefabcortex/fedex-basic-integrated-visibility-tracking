<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTrackingNumbers;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaTrackingNumbersConstraint;
use Symfony\Component\Validator\Constraint;

final class FullSchemaTrackingNumbersFixture
{
    public static function build(): FullSchemaTrackingNumbers
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $trackingInfo = TrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return FullSchemaTrackingNumbers::builder(
            // includeDetailedScans
            true,
            // trackingInfo
            [$trackingInfo],
        )->build();
    }

    /** @return callable(array<int|string, mixed>): FullSchemaTrackingNumbers */
    public static function reader(): callable
    {
        return FullSchemaTrackingNumbers::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return FullSchemaTrackingNumbersConstraint::constraints();
    }
}
