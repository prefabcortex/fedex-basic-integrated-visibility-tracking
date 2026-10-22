<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1LocationTypeEnum;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetail1_2Constraint;
use Symfony\Component\Validator\Constraint;

final class LocationDetail1_2Fixture
{
    public static function build(): LocationDetail1_2
    {
        return LocationDetail1_2::builder()
            ->setLocationId('SEA')
            ->setLocationType(LocationDetail1LocationTypeEnum::FEDEX_SHIPSITE)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): LocationDetail1_2 */
    public static function reader(): callable
    {
        return LocationDetail1_2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return LocationDetail1_2Constraint::constraints();
    }
}
