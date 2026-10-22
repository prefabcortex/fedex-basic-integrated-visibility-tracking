<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError404;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError404Constraint;
use Symfony\Component\Validator\Constraint;

final class CXSError404Fixture
{
    public static function build(): CXSError404
    {
        return CXSError404::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError404 */
    public static function reader(): callable
    {
        return CXSError404::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSError404Constraint::constraints();
    }
}
