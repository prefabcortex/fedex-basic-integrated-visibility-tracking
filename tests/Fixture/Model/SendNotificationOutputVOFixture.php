<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SendNotificationOutputVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\SendNotificationOutputVOConstraint;
use Symfony\Component\Validator\Constraint;

final class SendNotificationOutputVOFixture
{
    public static function build(): SendNotificationOutputVO
    {
        $alert = Alert::builder()->build();

        return SendNotificationOutputVO::builder()
            ->setAlerts([$alert])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): SendNotificationOutputVO */
    public static function reader(): callable
    {
        return SendNotificationOutputVO::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return SendNotificationOutputVOConstraint::constraints();
    }
}
