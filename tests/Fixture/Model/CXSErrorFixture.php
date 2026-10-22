<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSErrorConstraint;
use Symfony\Component\Validator\Constraint;

final class CXSErrorFixture
{
    public static function build(): CXSError
    {
        return CXSError::builder()
            ->setCode('TRACKING.TRACKINGNUMBER.EMPTY')
            ->setMessage('Please provide tracking number.')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): CXSError */
    public static function reader(): callable
    {
        return CXSError::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CXSErrorConstraint::constraints();
    }
}
