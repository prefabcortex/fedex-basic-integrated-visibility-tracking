<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryDetailsLocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DeliveryDetailsConstraint;
use Symfony\Component\Validator\Constraint;

final class DeliveryDetailsFixture
{
    public static function build(): DeliveryDetails
    {
        return DeliveryDetails::builder()
            ->setReceivedByName('Reciever')
            ->setDestinationServiceArea('EDDUNAVAILABLE')
            ->setDestinationServiceAreaDescription('Appointment required')
            ->setLocationDescription('Receptionist/Front Desk')
            ->setDeliveryToday(false)
            ->setLocationType(DeliveryDetailsLocationType::APARTMENT_OFFICE)
            ->setSignedByName('Reciever')
            ->setOfficeOrderDeliveryMethod('Courier')
            ->setDeliveryAttempts('0')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): DeliveryDetails */
    public static function reader(): callable
    {
        return DeliveryDetails::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DeliveryDetailsConstraint::constraints();
    }
}
