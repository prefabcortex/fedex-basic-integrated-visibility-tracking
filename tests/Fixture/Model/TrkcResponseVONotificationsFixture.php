<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVONotifications;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVONotificationsConstraint;
use Symfony\Component\Validator\Constraint;

final class TrkcResponseVONotificationsFixture
{
    public static function build(): TrkcResponseVONotifications
    {
        return TrkcResponseVONotifications::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrkcResponseVONotifications */
    public static function reader(): callable
    {
        return TrkcResponseVONotifications::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrkcResponseVONotificationsConstraint::constraints();
    }
}
