<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackSplitShipment;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackSplitShipmentConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackSplitShipmentFixture
{
    public static function build(): TrackSplitShipment
    {
        return TrackSplitShipment::builder()
            ->setPieceCount('10')
            ->setStatusDescription('status')
            ->setTimestamp('2019-05-07T08:00:07')
            ->setStatusCode('statuscode')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackSplitShipment */
    public static function reader(): callable
    {
        return TrackSplitShipment::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackSplitShipmentConstraint::constraints();
    }
}
