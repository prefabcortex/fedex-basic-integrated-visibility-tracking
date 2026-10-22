<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO403;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO403Constraint;
use Symfony\Component\Validator\Constraint;

final class ErrorResponseVO403Fixture
{
    public static function build(): ErrorResponseVO403
    {
        return ErrorResponseVO403::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ErrorResponseVO403 */
    public static function reader(): callable
    {
        return ErrorResponseVO403::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ErrorResponseVO403Constraint::constraints();
    }
}
