<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Examples\Operations;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedResponseException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ResponseValidationException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TransportException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnsupportedValueException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVONotifications;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Option;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Some;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\PostTrackV1NotificationHeaderParameters;

final class PostTrackV1NotificationExample
{
    /**
     * This endpoint helps you setup up, customize the tracking event notifications to be received
     * for a shipment.
     *
     * <i>Note: FedEx APIs do not support Cross-Origin Resource Sharing (CORS) mechanism.</i>
     *
     * Usage: pass a Client; this API declares no security scheme.
     *
     *   $client = Client::create($config);
     *   $headerParameters = new PostTrackV1NotificationHeaderParameters($authorization);
     *   PostTrackV1NotificationExample::postTrackV1Notification($client, PostTrackV1NotificationExample::buildExampleRequestBody(), $headerParameters);
     *
     * @param Option<FullSchemaNotification> $requestBody
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws PostTrackV1NotificationBadRequestException
     * @throws PostTrackV1NotificationUnauthorizedException
     * @throws PostTrackV1NotificationForbiddenException
     * @throws PostTrackV1NotificationNotFoundException
     * @throws PostTrackV1NotificationInternalServerErrorException
     * @throws PostTrackV1NotificationServiceUnavailableException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function postTrackV1Notification(
        Client $client,
        Option $requestBody,
        PostTrackV1NotificationHeaderParameters $headerParameters,
    ): TrkcResponseVONotifications {
        return $client->postTrackV1Notification(
            $requestBody,
            $headerParameters,
        );
    }

    /**
     * NOTE: This is a structurally valid skeleton generated from the OpenAPI schema (required
     * properties, plus optional properties that carry a spec `example:`). oneOf/anyOf alternatives
     * always pick the first option. It does NOT encode business rules the spec only documents in
     * prose (e.g. "either X or Y must be set"). Review the values and the API documentation before
     * production use.
     *
     * @return Option<FullSchemaNotification>
     */
    public static function buildExampleRequestBody(): Option
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

        return Some::create(FullSchemaNotification::builder(
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
            ->build());
    }
}
