<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeWindow;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeWindowType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TimeWindowConstraint;
use Symfony\Component\Validator\Constraint;

final class TimeWindowFixture
{
    public static function build(): TimeWindow
    {
        return TimeWindow::builder()
            ->setDescription('Description field')
            ->setType(TimeWindowType::ESTIMATED_DELIVERY)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TimeWindow */
    public static function reader(): callable
    {
        return TimeWindow::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TimeWindowConstraint::constraints();
    }
}
