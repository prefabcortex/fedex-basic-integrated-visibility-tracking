<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingEventNotificationDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingEventNotificationDetailFixture
{
    public static function build(): TrackingEventNotificationDetail
    {
        $localization = Localization::builder('en')
            ->setLocaleCode('US')
            ->build();
        $emailDetail = EmailDetail::builder('p1@fedex.com')
            ->setName('Preethi')
            ->build();
        $notificationDetail = TrackingNotificationDetail::builder(
            // localization
            $localization,
            // emailDetail
            $emailDetail,
            // notificationType
            'HTML',
        )->build();
        $trackingNotification = TrackingNotification::builder(
            // notificationDetail
            $notificationDetail,
            // notificationEventTypes
            ['ON_DELIVERY', 'ON_EXCEPTION', 'ON_ESTIMATED_DELIVERY'],
        )
            ->setRole('SHIPPER')
            ->setCurrentResultRequestedFlag(true)
            ->build();

        return TrackingEventNotificationDetail::builder([$trackingNotification])
            ->setPersonalMessage('Personal message content')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingEventNotificationDetail */
    public static function reader(): callable
    {
        return TrackingEventNotificationDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingEventNotificationDetailConstraint::constraints();
    }
}
