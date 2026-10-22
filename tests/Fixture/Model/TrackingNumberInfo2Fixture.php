<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo2CarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumberInfo2Constraint;
use Symfony\Component\Validator\Constraint;

final class TrackingNumberInfo2Fixture
{
    public static function build(): TrackingNumberInfo2
    {
        return TrackingNumberInfo2::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfo2CarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingNumberInfo2 */
    public static function reader(): callable
    {
        return TrackingNumberInfo2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingNumberInfo2Constraint::constraints();
    }
}
