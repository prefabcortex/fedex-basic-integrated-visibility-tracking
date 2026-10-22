<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO404;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO404Constraint;
use Symfony\Component\Validator\Constraint;

final class ErrorResponseVO404Fixture
{
    public static function build(): ErrorResponseVO404
    {
        return ErrorResponseVO404::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ErrorResponseVO404 */
    public static function reader(): callable
    {
        return ErrorResponseVO404::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ErrorResponseVO404Constraint::constraints();
    }
}
