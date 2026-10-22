<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackShipmentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackShipmentDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackShipmentDetailFixture
{
    public static function build(): TrackShipmentDetail
    {
        return TrackShipmentDetail::builder()
            ->setBeforePossessionStatus(false)
            ->setContentPieceCount('3333')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackShipmentDetail */
    public static function reader(): callable
    {
        return TrackShipmentDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackShipmentDetailConstraint::constraints();
    }
}
