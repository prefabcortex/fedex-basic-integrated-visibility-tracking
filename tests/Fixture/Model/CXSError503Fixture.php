<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError503;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError503Constraint;
use Symfony\Component\Validator\Constraint;

final class CXSError503Fixture
{
    public static function build(): CXSError503
    {
        return CXSError503::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError503 */
    public static function reader(): callable
    {
        return CXSError503::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSError503Constraint::constraints();
    }
}
