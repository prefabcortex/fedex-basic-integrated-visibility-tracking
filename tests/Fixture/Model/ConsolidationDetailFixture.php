<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ConsolidationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ConsolidationDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class ConsolidationDetailFixture
{
    public static function build(): ConsolidationDetail
    {
        return ConsolidationDetail::builder()
            ->setTimeStamp('2020-10-13T03:54:44-06:00')
            ->setConsolidationID('47936927')
            ->setPackageCount(25)
            ->setEventType('PACKAGE_ADDED_TO_CONSOLIDATION')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ConsolidationDetail */
    public static function reader(): callable
    {
        return ConsolidationDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ConsolidationDetailConstraint::constraints();
    }
}
