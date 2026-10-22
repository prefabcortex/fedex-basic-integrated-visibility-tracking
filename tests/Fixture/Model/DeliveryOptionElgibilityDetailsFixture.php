<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryOptionElgibilityDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryOptionElgibilityDetailsOption;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DeliveryOptionElgibilityDetailsConstraint;
use Symfony\Component\Validator\Constraint;

final class DeliveryOptionElgibilityDetailsFixture
{
    public static function build(): DeliveryOptionElgibilityDetails
    {
        return DeliveryOptionElgibilityDetails::builder()
            ->setOption(DeliveryOptionElgibilityDetailsOption::INDIRECT_SIGNATURE_RELEASE)
            ->setEligibility('INELIGIBLE')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): DeliveryOptionElgibilityDetails */
    public static function reader(): callable
    {
        return DeliveryOptionElgibilityDetails::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DeliveryOptionElgibilityDetailsConstraint::constraints();
    }
}
