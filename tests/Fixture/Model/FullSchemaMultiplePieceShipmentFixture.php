<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipment;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipmentAssociatedType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\MasterTrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaMultiplePieceShipmentConstraint;
use Symfony\Component\Validator\Constraint;

final class FullSchemaMultiplePieceShipmentFixture
{
    public static function build(): FullSchemaMultiplePieceShipment
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $masterTrackingNumberInfo = MasterTrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return FullSchemaMultiplePieceShipment::builder(
            // masterTrackingNumberInfo
            $masterTrackingNumberInfo,
            // associatedType
            FullSchemaMultiplePieceShipmentAssociatedType::STANDARD_MPS,
        )
            ->setIncludeDetailedScans(true)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): FullSchemaMultiplePieceShipment */
    public static function reader(): callable
    {
        return FullSchemaMultiplePieceShipment::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return FullSchemaMultiplePieceShipmentConstraint::constraints();
    }
}
