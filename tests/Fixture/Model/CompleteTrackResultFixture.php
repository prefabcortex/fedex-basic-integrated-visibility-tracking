<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CompleteTrackResult;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CompleteTrackResultConstraint;
use Symfony\Component\Validator\Constraint;

final class CompleteTrackResultFixture
{
    public static function build(): CompleteTrackResult
    {
        return CompleteTrackResult::builder()
            ->setTrackingNumber('123456789012')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): CompleteTrackResult */
    public static function reader(): callable
    {
        return CompleteTrackResult::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CompleteTrackResultConstraint::constraints();
    }
}
