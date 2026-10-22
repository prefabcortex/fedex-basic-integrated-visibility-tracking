<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOSPOD;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOSPODConstraint;
use Symfony\Component\Validator\Constraint;

final class TrkcResponseVOSPODFixture
{
    public static function build(): TrkcResponseVOSPOD
    {
        return TrkcResponseVOSPOD::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrkcResponseVOSPOD */
    public static function reader(): callable
    {
        return TrkcResponseVOSPOD::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrkcResponseVOSPODConstraint::constraints();
    }
}
