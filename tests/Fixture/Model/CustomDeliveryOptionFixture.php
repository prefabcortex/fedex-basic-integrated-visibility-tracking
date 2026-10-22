<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CustomDeliveryOption;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CustomDeliveryOptionType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CustomDeliveryOptionConstraint;
use Symfony\Component\Validator\Constraint;

final class CustomDeliveryOptionFixture
{
    public static function build(): CustomDeliveryOption
    {
        return CustomDeliveryOption::builder()
            ->setDescription('Redirect the package to the hold location.')
            ->setType(CustomDeliveryOptionType::REDIRECT_TO_HOLD_AT_LOCATION)
            ->setStatus('HELD')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): CustomDeliveryOption */
    public static function reader(): callable
    {
        return CustomDeliveryOption::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CustomDeliveryOptionConstraint::constraints();
    }
}
