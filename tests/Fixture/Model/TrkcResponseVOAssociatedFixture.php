<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOAssociated;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOAssociatedConstraint;
use Symfony\Component\Validator\Constraint;

final class TrkcResponseVOAssociatedFixture
{
    public static function build(): TrkcResponseVOAssociated
    {
        return TrkcResponseVOAssociated::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrkcResponseVOAssociated */
    public static function reader(): callable
    {
        return TrkcResponseVOAssociated::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrkcResponseVOAssociatedConstraint::constraints();
    }
}
