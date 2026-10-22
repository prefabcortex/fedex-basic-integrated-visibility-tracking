<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError403;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError403Constraint;
use Symfony\Component\Validator\Constraint;

final class CXSError403Fixture
{
    public static function build(): CXSError403
    {
        return CXSError403::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError403 */
    public static function reader(): callable
    {
        return CXSError403::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSError403Constraint::constraints();
    }
}
