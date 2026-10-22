<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVOConstraint;
use Symfony\Component\Validator\Constraint;

final class ErrorResponseVOFixture
{
    public static function build(): ErrorResponseVO
    {
        return ErrorResponseVO::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ErrorResponseVO */
    public static function reader(): callable
    {
        return ErrorResponseVO::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ErrorResponseVOConstraint::constraints();
    }
}
