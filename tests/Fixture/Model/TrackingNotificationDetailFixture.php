<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNotificationDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingNotificationDetailFixture
{
    public static function build(): TrackingNotificationDetail
    {
        $localization = Localization::builder('en')
            ->setLocaleCode('US')
            ->build();
        $emailDetail = EmailDetail::builder('p1@fedex.com')
            ->setName('Preethi')
            ->build();

        return TrackingNotificationDetail::builder(
            // localization
            $localization,
            // emailDetail
            $emailDetail,
            // notificationType
            'HTML',
        )->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingNotificationDetail */
    public static function reader(): callable
    {
        return TrackingNotificationDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingNotificationDetailConstraint::constraints();
    }
}
