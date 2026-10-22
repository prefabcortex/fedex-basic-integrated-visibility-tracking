<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError401;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError401Constraint;
use Symfony\Component\Validator\Constraint;

final class CXSError401Fixture
{
    public static function build(): CXSError401
    {
        return CXSError401::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError401 */
    public static function reader(): callable
    {
        return CXSError401::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSError401Constraint::constraints();
    }
}
