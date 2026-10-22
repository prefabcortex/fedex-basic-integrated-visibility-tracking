<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\StatusDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\StatusDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class StatusDetailFixture
{
    public static function build(): StatusDetail
    {
        return StatusDetail::builder()
            ->setCode('PU')
            ->setDerivedCode('PU')
            ->setStatusByLocale('Picked up')
            ->setDescription('Picked up')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): StatusDetail */
    public static function reader(): callable
    {
        return StatusDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return StatusDetailConstraint::constraints();
    }
}
