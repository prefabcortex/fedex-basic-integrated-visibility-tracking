<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOReferenceNumber;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOReferenceNumberConstraint;
use Symfony\Component\Validator\Constraint;

final class TrkcResponseVOReferenceNumberFixture
{
    public static function build(): TrkcResponseVOReferenceNumber
    {
        return TrkcResponseVOReferenceNumber::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrkcResponseVOReferenceNumber */
    public static function reader(): callable
    {
        return TrkcResponseVOReferenceNumber::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrkcResponseVOReferenceNumberConstraint::constraints();
    }
}
