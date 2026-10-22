<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetailStatus;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetailSubType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetailType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DelayDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class DelayDetailFixture
{
    public static function build(): DelayDetail
    {
        return DelayDetail::builder()
            ->setType(DelayDetailType::WEATHER)
            ->setSubType(DelayDetailSubType::SNOW)
            ->setStatus(DelayDetailStatus::DELAYED)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): DelayDetail */
    public static function reader(): callable
    {
        return DelayDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DelayDetailConstraint::constraints();
    }
}
