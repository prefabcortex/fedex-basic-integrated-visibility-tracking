<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentSpecification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackDocumentSpecificationConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackDocumentSpecificationFixture
{
    public static function build(): TrackDocumentSpecification
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();

        return TrackDocumentSpecification::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->setAccountNumber('XXX61073')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackDocumentSpecification */
    public static function reader(): callable
    {
        return TrackDocumentSpecification::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackDocumentSpecificationConstraint::constraints();
    }
}
