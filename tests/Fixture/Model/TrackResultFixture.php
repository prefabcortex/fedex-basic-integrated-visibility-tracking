<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackResult;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackResultConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackResultFixture
{
    public static function build(): TrackResult
    {
        return TrackResult::builder()
            ->setMeterNumber('8468376')
            ->setGoodsClassificationCode('goodsClassificationCode')
            ->setAvailableNotifications(['ON_DELIVERY', 'ON_EXCEPTION'])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackResult */
    public static function reader(): callable
    {
        return TrackResult::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackResultConstraint::constraints();
    }
}
