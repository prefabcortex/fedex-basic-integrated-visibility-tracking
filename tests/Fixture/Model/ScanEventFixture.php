<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ScanEvent;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ScanEventLocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ScanEventConstraint;
use Symfony\Component\Validator\Constraint;

final class ScanEventFixture
{
    public static function build(): ScanEvent
    {
        return ScanEvent::builder()
            ->setDate('2018-02-02T12:01:00-07:00')
            ->setDerivedStatus('Picked Up')
            ->setLocationId('SEA')
            ->setLocationType(ScanEventLocationType::CUSTOMS_BROKER)
            ->setExceptionDescription('Package available for clearance')
            ->setEventDescription('Picked Up')
            ->setEventType('PU')
            ->setDerivedStatusCode('PU')
            ->setExceptionCode('A25')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ScanEvent */
    public static function reader(): callable
    {
        return ScanEvent::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ScanEventConstraint::constraints();
    }
}
