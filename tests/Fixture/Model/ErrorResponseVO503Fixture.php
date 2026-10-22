<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO503;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO503Constraint;
use Symfony\Component\Validator\Constraint;

final class ErrorResponseVO503Fixture
{
    public static function build(): ErrorResponseVO503
    {
        return ErrorResponseVO503::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ErrorResponseVO503 */
    public static function reader(): callable
    {
        return ErrorResponseVO503::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ErrorResponseVO503Constraint::constraints();
    }
}
