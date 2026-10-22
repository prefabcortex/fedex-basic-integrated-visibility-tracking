<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO500;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO500Constraint;
use Symfony\Component\Validator\Constraint;

final class ErrorResponseVO500Fixture
{
    public static function build(): ErrorResponseVO500
    {
        return ErrorResponseVO500::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ErrorResponseVO500 */
    public static function reader(): callable
    {
        return ErrorResponseVO500::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ErrorResponseVO500Constraint::constraints();
    }
}
