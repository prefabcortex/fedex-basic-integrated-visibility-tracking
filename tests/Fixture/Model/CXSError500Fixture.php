<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError500;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError500Constraint;
use Symfony\Component\Validator\Constraint;

final class CXSError500Fixture
{
    public static function build(): CXSError500
    {
        return CXSError500::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError500 */
    public static function reader(): callable
    {
        return CXSError500::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSError500Constraint::constraints();
    }
}
