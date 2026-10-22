<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaSPOD;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentSpecification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaSPODConstraint;
use Symfony\Component\Validator\Constraint;

final class FullSchemaSPODFixture
{
    public static function build(): FullSchemaSPOD
    {
        $trackDocumentDetail = TrackDocumentDetail::builder('SIGNATURE_PROOF_OF_DELIVERY')
            ->setDocumentFormat('PNG')
            ->build();
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $trackDocumentSpecification = TrackDocumentSpecification::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->setAccountNumber('XXX61073')
            ->build();

        return FullSchemaSPOD::builder(
            // trackDocumentDetail
            $trackDocumentDetail,
            // trackDocumentSpecification
            [$trackDocumentSpecification],
        )->build();
    }

    /** @return callable(array<int|string, mixed>): FullSchemaSPOD */
    public static function reader(): callable
    {
        return FullSchemaSPOD::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return FullSchemaSPODConstraint::constraints();
    }
}
