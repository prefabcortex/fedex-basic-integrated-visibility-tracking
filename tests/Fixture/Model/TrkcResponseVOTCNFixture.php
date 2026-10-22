<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOTCNConstraint;
use Symfony\Component\Validator\Constraint;

final class TrkcResponseVOTCNFixture
{
    public static function build(): TrkcResponseVOTCN
    {
        return TrkcResponseVOTCN::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrkcResponseVOTCN */
    public static function reader(): callable
    {
        return TrkcResponseVOTCN::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrkcResponseVOTCNConstraint::constraints();
    }
}
