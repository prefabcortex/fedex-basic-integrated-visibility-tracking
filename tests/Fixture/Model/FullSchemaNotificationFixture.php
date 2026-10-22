<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaNotificationConstraint;
use Symfony\Component\Validator\Constraint;

final class FullSchemaNotificationFixture
{
    public static function build(): FullSchemaNotification
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
        $trackingEventNotificationDetail = TrackingEventNotificationDetail::builder([$trackingNotification])
            ->setPersonalMessage('Personal message content')
            ->build();
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();

        return FullSchemaNotification::builder(
            // senderContactName
            'Sam Smith',
            // senderEMailAddress
            'Lsr1234@gmail.com',
            // trackingEventNotificationDetail
            $trackingEventNotificationDetail,
            // trackingNumberInfo
            $trackingNumberInfo,
        )
            ->setShipDateBegin('2019-10-13')
            ->setShipDateEnd('2019-10-31')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): FullSchemaNotification */
    public static function reader(): callable
    {
        return FullSchemaNotification::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return FullSchemaNotificationConstraint::constraints();
    }
}
