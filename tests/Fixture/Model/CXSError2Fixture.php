<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError2Constraint;
use Symfony\Component\Validator\Constraint;

final class CXSError2Fixture
{
    public static function build(): CXSError2
    {
        return CXSError2::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError2 */
    public static function reader(): callable
    {
        return CXSError2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSError2Constraint::constraints();
    }
}
