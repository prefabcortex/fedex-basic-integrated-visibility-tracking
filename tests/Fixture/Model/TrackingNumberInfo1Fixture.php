<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo1CarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumberInfo1Constraint;
use Symfony\Component\Validator\Constraint;

final class TrackingNumberInfo1Fixture
{
    public static function build(): TrackingNumberInfo1
    {
        return TrackingNumberInfo1::builder()
            ->setTrackingNumber('128667043726')
            ->setCarrierCode(TrackingNumberInfo1CarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingNumberInfo1 */
    public static function reader(): callable
    {
        return TrackingNumberInfo1::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingNumberInfo1Constraint::constraints();
    }
}
