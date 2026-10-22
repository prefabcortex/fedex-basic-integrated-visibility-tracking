<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReasonDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ReasonDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class ReasonDetailFixture
{
    public static function build(): ReasonDetail
    {
        return ReasonDetail::builder()
            ->setDescription('Wrong color')
            ->setType('REJECTED')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ReasonDetail */
    public static function reader(): callable
    {
        return ReasonDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ReasonDetailConstraint::constraints();
    }
}
