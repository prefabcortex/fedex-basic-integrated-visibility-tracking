<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOTrackingNumber;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOTrackingNumberConstraint;
use Symfony\Component\Validator\Constraint;

final class TrkcResponseVOTrackingNumberFixture
{
    public static function build(): TrkcResponseVOTrackingNumber
    {
        return TrkcResponseVOTrackingNumber::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrkcResponseVOTrackingNumber */
    public static function reader(): callable
    {
        return TrkcResponseVOTrackingNumber::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrkcResponseVOTrackingNumberConstraint::constraints();
    }
}
