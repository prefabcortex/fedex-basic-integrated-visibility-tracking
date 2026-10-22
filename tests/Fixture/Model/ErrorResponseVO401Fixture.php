<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO401;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO401Constraint;
use Symfony\Component\Validator\Constraint;

final class ErrorResponseVO401Fixture
{
    public static function build(): ErrorResponseVO401
    {
        return ErrorResponseVO401::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ErrorResponseVO401 */
    public static function reader(): callable
    {
        return ErrorResponseVO401::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ErrorResponseVO401Constraint::constraints();
    }
}
