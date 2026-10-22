<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackSpecialHandling;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackSpecialHandlingConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackSpecialHandlingFixture
{
    public static function build(): TrackSpecialHandling
    {
        return TrackSpecialHandling::builder()
            ->setDescription('Deliver Weekday')
            ->setType('DELIVER_WEEKDAY')
            ->setPaymentType('OTHER')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackSpecialHandling */
    public static function reader(): callable
    {
        return TrackSpecialHandling::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackSpecialHandlingConstraint::constraints();
    }
}
