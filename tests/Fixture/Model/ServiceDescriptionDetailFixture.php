<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceDescriptionDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ServiceDescriptionDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class ServiceDescriptionDetailFixture
{
    public static function build(): ServiceDescriptionDetail
    {
        return ServiceDescriptionDetail::builder()
            ->setDescription('FedEx Freight Economy.')
            ->setShortDescription('FL')
            ->setType('FEDEX_FREIGHT_ECONOMY')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ServiceDescriptionDetail */
    public static function reader(): callable
    {
        return ServiceDescriptionDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ServiceDescriptionDetailConstraint::constraints();
    }
}
