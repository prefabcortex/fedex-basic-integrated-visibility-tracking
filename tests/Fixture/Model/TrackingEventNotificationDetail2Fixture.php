<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingEventNotificationDetail2Constraint;
use Symfony\Component\Validator\Constraint;

final class TrackingEventNotificationDetail2Fixture
{
    public static function build(): TrackingEventNotificationDetail2
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

        return TrackingEventNotificationDetail2::builder([$trackingNotification])
            ->setPersonalMessage('Personal message content')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingEventNotificationDetail2 */
    public static function reader(): callable
    {
        return TrackingEventNotificationDetail2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingEventNotificationDetail2Constraint::constraints();
    }
}
