<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ShipmentContent;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ShipmentContentConstraint;
use Symfony\Component\Validator\Constraint;

final class ShipmentContentFixture
{
    public static function build(): ShipmentContent
    {
        return ShipmentContent::builder()
            ->setItemNumber('RZ5678')
            ->setReceivedQuantity('13')
            ->setDescription('pulyurethane rope')
            ->setPartNumber('RK1345')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ShipmentContent */
    public static function reader(): callable
    {
        return ShipmentContent::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ShipmentContentConstraint::constraints();
    }
}
