<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AdditionalTrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Amount;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AvailableImagesDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CompleteTrackResult;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ConsolidationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CustomDeliveryOption;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError401;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError403;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError404;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError500;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError503;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryOptionElgibilityDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Dimensions;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Distance;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO401;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO403;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO404;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO500;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO503;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipment;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaSPOD;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTrackingNumbers;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTrackingReferences;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\InformationNoteDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetailOrigin;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\MasterTrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\OriginLocation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageIdentifier;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackagingDescription;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PagingDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PagingDetails2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Parameter;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Parameter2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PieceCountDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReasonDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReferenceInformation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\RequestedAppointmentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReturnDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ScanEvent;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SelfNormalizingModel;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SendNotificationOutputVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceCommitMessage;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceDescriptionDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ShipmentContent;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SPODResponseVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\StatusAncillaryDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\StatusDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TCNInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeRange;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeWindow;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentSpecification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingDateAndTime;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingMPSResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumbersResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumbersResponseTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingReferencesResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingWeightAndDimensions;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackResult;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackShipmentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackSpecialHandling;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackSplitShipment;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOAssociated;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVONotifications;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOReferenceNumber;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOSPOD;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOTrackingNumber;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Weight;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AdditionalTrackingInfoConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AddressVO1_2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AddressVO1Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AddressVOConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AlertConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AmountConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AvailableImagesDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CompleteTrackResultConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ConsolidationDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactAndAddress1_2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactAndAddress1Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactAndAddressConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactVO1_2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactVO1Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactVOConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CustomDeliveryOptionConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError401Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError403Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError404Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError500Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSError503Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\CXSErrorConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DelayDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DeliveryDetailsConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DeliveryOptionElgibilityDetailsConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DimensionsConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\DistanceConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\EmailDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO401Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO403Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO404Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO500Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVO503Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ErrorResponseVOConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaMultiplePieceShipmentConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaNotificationConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaSPODConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaTCNConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaTrackingNumbersConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaTrackingReferencesConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\InformationNoteDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocalizationConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetail1_2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetail1Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetailOriginConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\MasterTrackingInfoConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\OriginLocationConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PackageDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PackageIdentifierConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PackagingDescriptionConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PagingDetails2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PagingDetailsConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\Parameter2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ParameterConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PieceCountDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ReasonDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ReferenceInformationConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\RequestedAppointmentDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ReturnDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ScanEventConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\SendNotificationOutputVOConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ServiceCommitMessageConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ServiceDescriptionDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ShipmentContentConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\SPODResponseVOConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\StatusAncillaryDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\StatusDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TCNInfoConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TimeRangeConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TimeWindowConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackDocumentDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackDocumentSpecificationConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingDateAndTimeConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingEventNotificationDetail2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingEventNotificationDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingInfoConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingMPSResponseConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNotificationConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNotificationDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumberInfo1Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumberInfo2Constraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumberInfoConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumbersResponseConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingNumbersResponseTCNConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingReferencesResponseConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackingWeightAndDimensionsConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackResultConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackShipmentDetailConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackSpecialHandlingConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackSplitShipmentConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOAssociatedConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVONotificationsConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOReferenceNumberConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOSPODConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOTCNConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrkcResponseVOTrackingNumberConstraint;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\WeightConstraint;
use Symfony\Component\Validator\Constraint;

/**
 * The data providers over ModelFixtures: one schema-conformant instance of every model in this
 * package, and what each is checked against.
 *
 * Values are the ones the API description states — `example` or `default` where it gives one, a
 * typed placeholder where it does not. They are shaped like real data, not equal to it: nothing
 * here has been sent to the service, so a value being accepted by the schema says nothing about it
 * being accepted by the server.
 */
final class ModelFixtureProviders
{
    /**
     * Every model that could be built and reads back what it writes, keyed by class name so a
     * failure names the model.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel}>
     */
    public static function roundTrips(): iterable
    {
        yield 'FullSchemaMultiplePieceShipment' => [
            ModelFixtures::buildFullSchemaMultiplePieceShipment(),
            FullSchemaMultiplePieceShipment::fromArray(...),
        ];
        yield 'MasterTrackingInfo' => [ModelFixtures::buildMasterTrackingInfo(), MasterTrackingInfo::fromArray(...)];
        yield 'TrackingInfo' => [ModelFixtures::buildTrackingInfo(), TrackingInfo::fromArray(...)];
        yield 'TrackingNumberInfo' => [ModelFixtures::buildTrackingNumberInfo(), TrackingNumberInfo::fromArray(...)];
        yield 'PagingDetails' => [ModelFixtures::buildPagingDetails(), PagingDetails::fromArray(...)];
        yield 'PagingDetails2' => [ModelFixtures::buildPagingDetails2(), PagingDetails2::fromArray(...)];
        yield 'TrkcResponseVOAssociated' => [
            ModelFixtures::buildTrkcResponseVOAssociated(),
            TrkcResponseVOAssociated::fromArray(...),
        ];
        yield 'TrackingMPSResponse' => [ModelFixtures::buildTrackingMPSResponse(), TrackingMPSResponse::fromArray(...)];
        yield 'CompleteTrackResult' => [ModelFixtures::buildCompleteTrackResult(), CompleteTrackResult::fromArray(...)];
        yield 'TrackResult' => [ModelFixtures::buildTrackResult(), TrackResult::fromArray(...)];
        yield 'AdditionalTrackingInfo' => [
            ModelFixtures::buildAdditionalTrackingInfo(),
            AdditionalTrackingInfo::fromArray(...),
        ];
        yield 'PackageIdentifier' => [ModelFixtures::buildPackageIdentifier(), PackageIdentifier::fromArray(...)];
        yield 'Distance' => [ModelFixtures::buildDistance(), Distance::fromArray(...)];
        yield 'ConsolidationDetail' => [ModelFixtures::buildConsolidationDetail(), ConsolidationDetail::fromArray(...)];
        yield 'ReasonDetail' => [ModelFixtures::buildReasonDetail(), ReasonDetail::fromArray(...)];
        yield 'ReturnDetail' => [ModelFixtures::buildReturnDetail(), ReturnDetail::fromArray(...)];
        yield 'ServiceDescriptionDetail' => [
            ModelFixtures::buildServiceDescriptionDetail(),
            ServiceDescriptionDetail::fromArray(...),
        ];
        yield 'LocationDetail1' => [ModelFixtures::buildLocationDetail1(), LocationDetail1::fromArray(...)];
        yield 'ContactAndAddress1' => [ModelFixtures::buildContactAndAddress1(), ContactAndAddress1::fromArray(...)];
        yield 'ContactVO1' => [ModelFixtures::buildContactVO1(), ContactVO1::fromArray(...)];
        yield 'AddressVO1' => [ModelFixtures::buildAddressVO1(), AddressVO1::fromArray(...)];
        yield 'StatusDetail' => [ModelFixtures::buildStatusDetail(), StatusDetail::fromArray(...)];
        yield 'AddressVO' => [ModelFixtures::buildAddressVO(), AddressVO::fromArray(...)];
        yield 'StatusAncillaryDetail' => [
            ModelFixtures::buildStatusAncillaryDetail(),
            StatusAncillaryDetail::fromArray(...),
        ];
        yield 'DelayDetail' => [ModelFixtures::buildDelayDetail(), DelayDetail::fromArray(...)];
        yield 'ServiceCommitMessage' => [
            ModelFixtures::buildServiceCommitMessage(),
            ServiceCommitMessage::fromArray(...),
        ];
        yield 'InformationNoteDetail' => [
            ModelFixtures::buildInformationNoteDetail(),
            InformationNoteDetail::fromArray(...),
        ];
        yield 'CXSError' => [ModelFixtures::buildCXSError(), CXSError::fromArray(...)];
        yield 'Parameter' => [ModelFixtures::buildParameter(), Parameter::fromArray(...)];
        yield 'TrackSpecialHandling' => [
            ModelFixtures::buildTrackSpecialHandling(),
            TrackSpecialHandling::fromArray(...),
        ];
        yield 'AvailableImagesDetail' => [
            ModelFixtures::buildAvailableImagesDetail(),
            AvailableImagesDetail::fromArray(...),
        ];
        yield 'DeliveryDetails' => [ModelFixtures::buildDeliveryDetails(), DeliveryDetails::fromArray(...)];
        yield 'DeliveryOptionElgibilityDetails' => [
            ModelFixtures::buildDeliveryOptionElgibilityDetails(),
            DeliveryOptionElgibilityDetails::fromArray(...),
        ];
        yield 'ScanEvent' => [ModelFixtures::buildScanEvent(), ScanEvent::fromArray(...)];
        yield 'TrackingDateAndTime' => [ModelFixtures::buildTrackingDateAndTime(), TrackingDateAndTime::fromArray(...)];
        yield 'PackageDetail' => [ModelFixtures::buildPackageDetail(), PackageDetail::fromArray(...)];
        yield 'PackagingDescription' => [
            ModelFixtures::buildPackagingDescription(),
            PackagingDescription::fromArray(...),
        ];
        yield 'TrackingWeightAndDimensions' => [
            ModelFixtures::buildTrackingWeightAndDimensions(),
            TrackingWeightAndDimensions::fromArray(...),
        ];
        yield 'Weight' => [ModelFixtures::buildWeight(), Weight::fromArray(...)];
        yield 'Dimensions' => [ModelFixtures::buildDimensions(), Dimensions::fromArray(...)];
        yield 'Amount' => [ModelFixtures::buildAmount(), Amount::fromArray(...)];
        yield 'LocationDetail' => [ModelFixtures::buildLocationDetail(), LocationDetail::fromArray(...)];
        yield 'ContactAndAddress' => [ModelFixtures::buildContactAndAddress(), ContactAndAddress::fromArray(...)];
        yield 'ContactVO' => [ModelFixtures::buildContactVO(), ContactVO::fromArray(...)];
        yield 'CustomDeliveryOption' => [
            ModelFixtures::buildCustomDeliveryOption(),
            CustomDeliveryOption::fromArray(...),
        ];
        yield 'RequestedAppointmentDetail' => [
            ModelFixtures::buildRequestedAppointmentDetail(),
            RequestedAppointmentDetail::fromArray(...),
        ];
        yield 'TimeWindow' => [ModelFixtures::buildTimeWindow(), TimeWindow::fromArray(...)];
        yield 'TimeRange' => [ModelFixtures::buildTimeRange(), TimeRange::fromArray(...)];
        yield 'PieceCountDetail' => [ModelFixtures::buildPieceCountDetail(), PieceCountDetail::fromArray(...)];
        yield 'OriginLocation' => [ModelFixtures::buildOriginLocation(), OriginLocation::fromArray(...)];
        yield 'TrackShipmentDetail' => [ModelFixtures::buildTrackShipmentDetail(), TrackShipmentDetail::fromArray(...)];
        yield 'ShipmentContent' => [ModelFixtures::buildShipmentContent(), ShipmentContent::fromArray(...)];
        yield 'TrackSplitShipment' => [ModelFixtures::buildTrackSplitShipment(), TrackSplitShipment::fromArray(...)];
        yield 'Alert' => [ModelFixtures::buildAlert(), Alert::fromArray(...)];
        yield 'ErrorResponseVO' => [ModelFixtures::buildErrorResponseVO(), ErrorResponseVO::fromArray(...)];
        yield 'CXSError2' => [ModelFixtures::buildCXSError2(), CXSError2::fromArray(...)];
        yield 'ErrorResponseVO401' => [ModelFixtures::buildErrorResponseVO401(), ErrorResponseVO401::fromArray(...)];
        yield 'CXSError401' => [ModelFixtures::buildCXSError401(), CXSError401::fromArray(...)];
        yield 'ErrorResponseVO403' => [ModelFixtures::buildErrorResponseVO403(), ErrorResponseVO403::fromArray(...)];
        yield 'CXSError403' => [ModelFixtures::buildCXSError403(), CXSError403::fromArray(...)];
        yield 'ErrorResponseVO404' => [ModelFixtures::buildErrorResponseVO404(), ErrorResponseVO404::fromArray(...)];
        yield 'CXSError404' => [ModelFixtures::buildCXSError404(), CXSError404::fromArray(...)];
        yield 'ErrorResponseVO500' => [ModelFixtures::buildErrorResponseVO500(), ErrorResponseVO500::fromArray(...)];
        yield 'CXSError500' => [ModelFixtures::buildCXSError500(), CXSError500::fromArray(...)];
        yield 'ErrorResponseVO503' => [ModelFixtures::buildErrorResponseVO503(), ErrorResponseVO503::fromArray(...)];
        yield 'CXSError503' => [ModelFixtures::buildCXSError503(), CXSError503::fromArray(...)];
        yield 'FullSchemaNotification' => [
            ModelFixtures::buildFullSchemaNotification(),
            FullSchemaNotification::fromArray(...),
        ];
        yield 'TrackingEventNotificationDetail' => [
            ModelFixtures::buildTrackingEventNotificationDetail(),
            TrackingEventNotificationDetail::fromArray(...),
        ];
        yield 'TrackingEventNotificationDetail2' => [
            ModelFixtures::buildTrackingEventNotificationDetail2(),
            TrackingEventNotificationDetail2::fromArray(...),
        ];
        yield 'TrackingNotification' => [
            ModelFixtures::buildTrackingNotification(),
            TrackingNotification::fromArray(...),
        ];
        yield 'TrackingNotificationDetail' => [
            ModelFixtures::buildTrackingNotificationDetail(),
            TrackingNotificationDetail::fromArray(...),
        ];
        yield 'Localization' => [ModelFixtures::buildLocalization(), Localization::fromArray(...)];
        yield 'EmailDetail' => [ModelFixtures::buildEmailDetail(), EmailDetail::fromArray(...)];
        yield 'TrackingNumberInfo2' => [ModelFixtures::buildTrackingNumberInfo2(), TrackingNumberInfo2::fromArray(...)];
        yield 'TrkcResponseVONotifications' => [
            ModelFixtures::buildTrkcResponseVONotifications(),
            TrkcResponseVONotifications::fromArray(...),
        ];
        yield 'SendNotificationOutputVO' => [
            ModelFixtures::buildSendNotificationOutputVO(),
            SendNotificationOutputVO::fromArray(...),
        ];
        yield 'FullSchemaTrackingReferences' => [
            ModelFixtures::buildFullSchemaTrackingReferences(),
            FullSchemaTrackingReferences::fromArray(...),
        ];
        yield 'ReferenceInformation' => [
            ModelFixtures::buildReferenceInformation(),
            ReferenceInformation::fromArray(...),
        ];
        yield 'TrkcResponseVOReferenceNumber' => [
            ModelFixtures::buildTrkcResponseVOReferenceNumber(),
            TrkcResponseVOReferenceNumber::fromArray(...),
        ];
        yield 'TrackingReferencesResponse' => [
            ModelFixtures::buildTrackingReferencesResponse(),
            TrackingReferencesResponse::fromArray(...),
        ];
        yield 'FullSchemaTCN' => [ModelFixtures::buildFullSchemaTCN(), FullSchemaTCN::fromArray(...)];
        yield 'TCNInfo' => [ModelFixtures::buildTCNInfo(), TCNInfo::fromArray(...)];
        yield 'TrkcResponseVOTCN' => [ModelFixtures::buildTrkcResponseVOTCN(), TrkcResponseVOTCN::fromArray(...)];
        yield 'TrackingNumbersResponseTCN' => [
            ModelFixtures::buildTrackingNumbersResponseTCN(),
            TrackingNumbersResponseTCN::fromArray(...),
        ];
        yield 'Parameter2' => [ModelFixtures::buildParameter2(), Parameter2::fromArray(...)];
        yield 'FullSchemaSPOD' => [ModelFixtures::buildFullSchemaSPOD(), FullSchemaSPOD::fromArray(...)];
        yield 'TrackDocumentDetail' => [ModelFixtures::buildTrackDocumentDetail(), TrackDocumentDetail::fromArray(...)];
        yield 'TrackDocumentSpecification' => [
            ModelFixtures::buildTrackDocumentSpecification(),
            TrackDocumentSpecification::fromArray(...),
        ];
        yield 'TrkcResponseVOSPOD' => [ModelFixtures::buildTrkcResponseVOSPOD(), TrkcResponseVOSPOD::fromArray(...)];
        yield 'SPODResponseVO' => [ModelFixtures::buildSPODResponseVO(), SPODResponseVO::fromArray(...)];
        yield 'FullSchemaTrackingNumbers' => [
            ModelFixtures::buildFullSchemaTrackingNumbers(),
            FullSchemaTrackingNumbers::fromArray(...),
        ];
        yield 'TrackingNumberInfo1' => [ModelFixtures::buildTrackingNumberInfo1(), TrackingNumberInfo1::fromArray(...)];
        yield 'TrkcResponseVOTrackingNumber' => [
            ModelFixtures::buildTrkcResponseVOTrackingNumber(),
            TrkcResponseVOTrackingNumber::fromArray(...),
        ];
        yield 'TrackingNumbersResponse' => [
            ModelFixtures::buildTrackingNumbersResponse(),
            TrackingNumbersResponse::fromArray(...),
        ];
        yield 'LocationDetailOrigin' => [
            ModelFixtures::buildLocationDetailOrigin(),
            LocationDetailOrigin::fromArray(...),
        ];
        yield 'LocationDetail1_2' => [ModelFixtures::buildLocationDetail12(), LocationDetail1_2::fromArray(...)];
        yield 'ContactAndAddress1_2' => [
            ModelFixtures::buildContactAndAddress12(),
            ContactAndAddress1_2::fromArray(...),
        ];
        yield 'ContactVO1_2' => [ModelFixtures::buildContactVO12(), ContactVO1_2::fromArray(...)];
        yield 'AddressVO1_2' => [ModelFixtures::buildAddressVO12(), AddressVO1_2::fromArray(...)];
    }

    /**
     * Each model with the wire names its document must carry.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, list<string>}>
     */
    public static function documentsMissingARequiredProperty(): iterable
    {
        yield 'FullSchemaMultiplePieceShipment' => [
            ModelFixtures::buildFullSchemaMultiplePieceShipment(),
            FullSchemaMultiplePieceShipment::fromArray(...),
            ['masterTrackingNumberInfo', 'associatedType'],
        ];
        yield 'MasterTrackingInfo' => [
            ModelFixtures::buildMasterTrackingInfo(),
            MasterTrackingInfo::fromArray(...),
            ['trackingNumberInfo'],
        ];
        yield 'TrackingInfo' => [
            ModelFixtures::buildTrackingInfo(),
            TrackingInfo::fromArray(...),
            ['trackingNumberInfo'],
        ];
        yield 'TrackingNumberInfo' => [
            ModelFixtures::buildTrackingNumberInfo(),
            TrackingNumberInfo::fromArray(...),
            ['trackingNumber'],
        ];
        yield 'LocationDetail1' => [
            ModelFixtures::buildLocationDetail1(),
            LocationDetail1::fromArray(...),
            ['locationContactAndAddress', 'locationType'],
        ];
        yield 'ContactAndAddress1' => [
            ModelFixtures::buildContactAndAddress1(),
            ContactAndAddress1::fromArray(...),
            ['contact', 'address'],
        ];
        yield 'AddressVO1' => [
            ModelFixtures::buildAddressVO1(),
            AddressVO1::fromArray(...),
            ['streetLines', 'countryCode'],
        ];
        yield 'AddressVO' => [
            ModelFixtures::buildAddressVO(),
            AddressVO::fromArray(...),
            ['streetLines', 'countryCode'],
        ];
        yield 'LocationDetail' => [
            ModelFixtures::buildLocationDetail(),
            LocationDetail::fromArray(...),
            ['locationContactAndAddress', 'locationType'],
        ];
        yield 'ContactAndAddress' => [
            ModelFixtures::buildContactAndAddress(),
            ContactAndAddress::fromArray(...),
            ['contact', 'address'],
        ];
        yield 'FullSchemaNotification' => [
            ModelFixtures::buildFullSchemaNotification(),
            FullSchemaNotification::fromArray(...),
            ['senderContactName', 'senderEMailAddress', 'trackingEventNotificationDetail', 'trackingNumberInfo'],
        ];
        yield 'TrackingEventNotificationDetail' => [
            ModelFixtures::buildTrackingEventNotificationDetail(),
            TrackingEventNotificationDetail::fromArray(...),
            ['trackingNotifications'],
        ];
        yield 'TrackingEventNotificationDetail2' => [
            ModelFixtures::buildTrackingEventNotificationDetail2(),
            TrackingEventNotificationDetail2::fromArray(...),
            ['trackingNotifications'],
        ];
        yield 'TrackingNotification' => [
            ModelFixtures::buildTrackingNotification(),
            TrackingNotification::fromArray(...),
            ['notificationDetail', 'notificationEventTypes'],
        ];
        yield 'TrackingNotificationDetail' => [
            ModelFixtures::buildTrackingNotificationDetail(),
            TrackingNotificationDetail::fromArray(...),
            ['localization', 'emailDetail', 'notificationType'],
        ];
        yield 'Localization' => [ModelFixtures::buildLocalization(), Localization::fromArray(...), ['languageCode']];
        yield 'EmailDetail' => [ModelFixtures::buildEmailDetail(), EmailDetail::fromArray(...), ['emailAddress']];
        yield 'TrackingNumberInfo2' => [
            ModelFixtures::buildTrackingNumberInfo2(),
            TrackingNumberInfo2::fromArray(...),
            ['trackingNumber'],
        ];
        yield 'FullSchemaTrackingReferences' => [
            ModelFixtures::buildFullSchemaTrackingReferences(),
            FullSchemaTrackingReferences::fromArray(...),
            ['referencesInformation'],
        ];
        yield 'ReferenceInformation' => [
            ModelFixtures::buildReferenceInformation(),
            ReferenceInformation::fromArray(...),
            ['value', 'shipDateBegin', 'shipDateEndDate'],
        ];
        yield 'FullSchemaTCN' => [ModelFixtures::buildFullSchemaTCN(), FullSchemaTCN::fromArray(...), ['tcnInfo']];
        yield 'TCNInfo' => [ModelFixtures::buildTCNInfo(), TCNInfo::fromArray(...), ['value']];
        yield 'FullSchemaSPOD' => [
            ModelFixtures::buildFullSchemaSPOD(),
            FullSchemaSPOD::fromArray(...),
            ['trackDocumentDetail', 'trackDocumentSpecification'],
        ];
        yield 'TrackDocumentDetail' => [
            ModelFixtures::buildTrackDocumentDetail(),
            TrackDocumentDetail::fromArray(...),
            ['documentType'],
        ];
        yield 'TrackDocumentSpecification' => [
            ModelFixtures::buildTrackDocumentSpecification(),
            TrackDocumentSpecification::fromArray(...),
            ['trackingNumberInfo'],
        ];
        yield 'FullSchemaTrackingNumbers' => [
            ModelFixtures::buildFullSchemaTrackingNumbers(),
            FullSchemaTrackingNumbers::fromArray(...),
            ['includeDetailedScans', 'trackingInfo'],
        ];
    }

    /**
     * Each model with, per wire name, a value of a type that property cannot hold.
     *
     * Only properties whose type is a single closed shape appear. A union may legitimately accept
     * what looks like the wrong type, and a schema stating no type accepts anything.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, array<array-key, int|string>}>
     */
    public static function documentsWithAMistypedProperty(): iterable
    {
        yield 'FullSchemaMultiplePieceShipment' => [
            ModelFixtures::buildFullSchemaMultiplePieceShipment(),
            FullSchemaMultiplePieceShipment::fromArray(...),
            ['masterTrackingNumberInfo' => 'not-an-object', 'associatedType' => 42],
        ];
        yield 'MasterTrackingInfo' => [
            ModelFixtures::buildMasterTrackingInfo(),
            MasterTrackingInfo::fromArray(...),
            ['trackingNumberInfo' => 'not-an-object'],
        ];
        yield 'TrackingInfo' => [
            ModelFixtures::buildTrackingInfo(),
            TrackingInfo::fromArray(...),
            ['trackingNumberInfo' => 'not-an-object'],
        ];
        yield 'TrackingNumberInfo' => [
            ModelFixtures::buildTrackingNumberInfo(),
            TrackingNumberInfo::fromArray(...),
            ['trackingNumber' => 42],
        ];
        yield 'LocationDetail1' => [
            ModelFixtures::buildLocationDetail1(),
            LocationDetail1::fromArray(...),
            ['locationContactAndAddress' => 'not-an-object', 'locationType' => 42],
        ];
        yield 'ContactAndAddress1' => [
            ModelFixtures::buildContactAndAddress1(),
            ContactAndAddress1::fromArray(...),
            ['contact' => 'not-an-object', 'address' => 'not-an-object'],
        ];
        yield 'AddressVO1' => [
            ModelFixtures::buildAddressVO1(),
            AddressVO1::fromArray(...),
            ['streetLines' => 'not-an-object', 'countryCode' => 42],
        ];
        yield 'AddressVO' => [
            ModelFixtures::buildAddressVO(),
            AddressVO::fromArray(...),
            ['streetLines' => 'not-an-object', 'countryCode' => 42],
        ];
        yield 'LocationDetail' => [
            ModelFixtures::buildLocationDetail(),
            LocationDetail::fromArray(...),
            ['locationContactAndAddress' => 'not-an-object', 'locationType' => 42],
        ];
        yield 'ContactAndAddress' => [
            ModelFixtures::buildContactAndAddress(),
            ContactAndAddress::fromArray(...),
            ['contact' => 'not-an-object', 'address' => 'not-an-object'],
        ];
        yield 'FullSchemaNotification' => [
            ModelFixtures::buildFullSchemaNotification(),
            FullSchemaNotification::fromArray(...),
            [
                'senderContactName' => 42,
                'senderEMailAddress' => 42,
                'trackingEventNotificationDetail' => 'not-an-object',
                'trackingNumberInfo' => 'not-an-object',
            ],
        ];
        yield 'TrackingEventNotificationDetail' => [
            ModelFixtures::buildTrackingEventNotificationDetail(),
            TrackingEventNotificationDetail::fromArray(...),
            ['trackingNotifications' => 'not-an-object'],
        ];
        yield 'TrackingEventNotificationDetail2' => [
            ModelFixtures::buildTrackingEventNotificationDetail2(),
            TrackingEventNotificationDetail2::fromArray(...),
            ['trackingNotifications' => 'not-an-object'],
        ];
        yield 'TrackingNotification' => [
            ModelFixtures::buildTrackingNotification(),
            TrackingNotification::fromArray(...),
            ['notificationDetail' => 'not-an-object', 'notificationEventTypes' => 'not-an-object'],
        ];
        yield 'TrackingNotificationDetail' => [
            ModelFixtures::buildTrackingNotificationDetail(),
            TrackingNotificationDetail::fromArray(...),
            ['localization' => 'not-an-object', 'emailDetail' => 'not-an-object', 'notificationType' => 42],
        ];
        yield 'Localization' => [
            ModelFixtures::buildLocalization(),
            Localization::fromArray(...),
            ['languageCode' => 42],
        ];
        yield 'EmailDetail' => [ModelFixtures::buildEmailDetail(), EmailDetail::fromArray(...), ['emailAddress' => 42]];
        yield 'TrackingNumberInfo2' => [
            ModelFixtures::buildTrackingNumberInfo2(),
            TrackingNumberInfo2::fromArray(...),
            ['trackingNumber' => 42],
        ];
        yield 'FullSchemaTrackingReferences' => [
            ModelFixtures::buildFullSchemaTrackingReferences(),
            FullSchemaTrackingReferences::fromArray(...),
            ['referencesInformation' => 'not-an-object'],
        ];
        yield 'ReferenceInformation' => [
            ModelFixtures::buildReferenceInformation(),
            ReferenceInformation::fromArray(...),
            ['value' => 42, 'shipDateBegin' => 42, 'shipDateEndDate' => 42],
        ];
        yield 'FullSchemaTCN' => [
            ModelFixtures::buildFullSchemaTCN(),
            FullSchemaTCN::fromArray(...),
            ['tcnInfo' => 'not-an-object'],
        ];
        yield 'TCNInfo' => [ModelFixtures::buildTCNInfo(), TCNInfo::fromArray(...), ['value' => 42]];
        yield 'FullSchemaSPOD' => [
            ModelFixtures::buildFullSchemaSPOD(),
            FullSchemaSPOD::fromArray(...),
            ['trackDocumentDetail' => 'not-an-object', 'trackDocumentSpecification' => 'not-an-object'],
        ];
        yield 'TrackDocumentDetail' => [
            ModelFixtures::buildTrackDocumentDetail(),
            TrackDocumentDetail::fromArray(...),
            ['documentType' => 42],
        ];
        yield 'TrackDocumentSpecification' => [
            ModelFixtures::buildTrackDocumentSpecification(),
            TrackDocumentSpecification::fromArray(...),
            ['trackingNumberInfo' => 'not-an-object'],
        ];
        yield 'FullSchemaTrackingNumbers' => [
            ModelFixtures::buildFullSchemaTrackingNumbers(),
            FullSchemaTrackingNumbers::fromArray(...),
            ['includeDetailedScans' => 0, 'trackingInfo' => 'not-an-object'],
        ];
    }

    /**
     * Each model whose values all pass their constraints, with those constraints.
     *
     * @return iterable<string, array{SelfNormalizingModel, list<Constraint>}>
     */
    public static function modelsWithTheirConstraints(): iterable
    {
        yield 'FullSchemaMultiplePieceShipment' => [
            ModelFixtures::buildFullSchemaMultiplePieceShipment(),
            FullSchemaMultiplePieceShipmentConstraint::constraints(),
        ];
        yield 'MasterTrackingInfo' => [
            ModelFixtures::buildMasterTrackingInfo(),
            MasterTrackingInfoConstraint::constraints(),
        ];
        yield 'TrackingInfo' => [ModelFixtures::buildTrackingInfo(), TrackingInfoConstraint::constraints()];
        yield 'TrackingNumberInfo' => [
            ModelFixtures::buildTrackingNumberInfo(),
            TrackingNumberInfoConstraint::constraints(),
        ];
        yield 'PagingDetails' => [ModelFixtures::buildPagingDetails(), PagingDetailsConstraint::constraints()];
        yield 'PagingDetails2' => [ModelFixtures::buildPagingDetails2(), PagingDetails2Constraint::constraints()];
        yield 'TrkcResponseVOAssociated' => [
            ModelFixtures::buildTrkcResponseVOAssociated(),
            TrkcResponseVOAssociatedConstraint::constraints(),
        ];
        yield 'TrackingMPSResponse' => [
            ModelFixtures::buildTrackingMPSResponse(),
            TrackingMPSResponseConstraint::constraints(),
        ];
        yield 'CompleteTrackResult' => [
            ModelFixtures::buildCompleteTrackResult(),
            CompleteTrackResultConstraint::constraints(),
        ];
        yield 'TrackResult' => [ModelFixtures::buildTrackResult(), TrackResultConstraint::constraints()];
        yield 'AdditionalTrackingInfo' => [
            ModelFixtures::buildAdditionalTrackingInfo(),
            AdditionalTrackingInfoConstraint::constraints(),
        ];
        yield 'PackageIdentifier' => [
            ModelFixtures::buildPackageIdentifier(),
            PackageIdentifierConstraint::constraints(),
        ];
        yield 'Distance' => [ModelFixtures::buildDistance(), DistanceConstraint::constraints()];
        yield 'ConsolidationDetail' => [
            ModelFixtures::buildConsolidationDetail(),
            ConsolidationDetailConstraint::constraints(),
        ];
        yield 'ReasonDetail' => [ModelFixtures::buildReasonDetail(), ReasonDetailConstraint::constraints()];
        yield 'ReturnDetail' => [ModelFixtures::buildReturnDetail(), ReturnDetailConstraint::constraints()];
        yield 'ServiceDescriptionDetail' => [
            ModelFixtures::buildServiceDescriptionDetail(),
            ServiceDescriptionDetailConstraint::constraints(),
        ];
        yield 'LocationDetail1' => [ModelFixtures::buildLocationDetail1(), LocationDetail1Constraint::constraints()];
        yield 'ContactAndAddress1' => [
            ModelFixtures::buildContactAndAddress1(),
            ContactAndAddress1Constraint::constraints(),
        ];
        yield 'ContactVO1' => [ModelFixtures::buildContactVO1(), ContactVO1Constraint::constraints()];
        yield 'AddressVO1' => [ModelFixtures::buildAddressVO1(), AddressVO1Constraint::constraints()];
        yield 'StatusDetail' => [ModelFixtures::buildStatusDetail(), StatusDetailConstraint::constraints()];
        yield 'AddressVO' => [ModelFixtures::buildAddressVO(), AddressVOConstraint::constraints()];
        yield 'StatusAncillaryDetail' => [
            ModelFixtures::buildStatusAncillaryDetail(),
            StatusAncillaryDetailConstraint::constraints(),
        ];
        yield 'DelayDetail' => [ModelFixtures::buildDelayDetail(), DelayDetailConstraint::constraints()];
        yield 'ServiceCommitMessage' => [
            ModelFixtures::buildServiceCommitMessage(),
            ServiceCommitMessageConstraint::constraints(),
        ];
        yield 'InformationNoteDetail' => [
            ModelFixtures::buildInformationNoteDetail(),
            InformationNoteDetailConstraint::constraints(),
        ];
        yield 'CXSError' => [ModelFixtures::buildCXSError(), CXSErrorConstraint::constraints()];
        yield 'Parameter' => [ModelFixtures::buildParameter(), ParameterConstraint::constraints()];
        yield 'TrackSpecialHandling' => [
            ModelFixtures::buildTrackSpecialHandling(),
            TrackSpecialHandlingConstraint::constraints(),
        ];
        yield 'AvailableImagesDetail' => [
            ModelFixtures::buildAvailableImagesDetail(),
            AvailableImagesDetailConstraint::constraints(),
        ];
        yield 'DeliveryDetails' => [ModelFixtures::buildDeliveryDetails(), DeliveryDetailsConstraint::constraints()];
        yield 'DeliveryOptionElgibilityDetails' => [
            ModelFixtures::buildDeliveryOptionElgibilityDetails(),
            DeliveryOptionElgibilityDetailsConstraint::constraints(),
        ];
        yield 'ScanEvent' => [ModelFixtures::buildScanEvent(), ScanEventConstraint::constraints()];
        yield 'TrackingDateAndTime' => [
            ModelFixtures::buildTrackingDateAndTime(),
            TrackingDateAndTimeConstraint::constraints(),
        ];
        yield 'PackageDetail' => [ModelFixtures::buildPackageDetail(), PackageDetailConstraint::constraints()];
        yield 'PackagingDescription' => [
            ModelFixtures::buildPackagingDescription(),
            PackagingDescriptionConstraint::constraints(),
        ];
        yield 'TrackingWeightAndDimensions' => [
            ModelFixtures::buildTrackingWeightAndDimensions(),
            TrackingWeightAndDimensionsConstraint::constraints(),
        ];
        yield 'Weight' => [ModelFixtures::buildWeight(), WeightConstraint::constraints()];
        yield 'Dimensions' => [ModelFixtures::buildDimensions(), DimensionsConstraint::constraints()];
        yield 'Amount' => [ModelFixtures::buildAmount(), AmountConstraint::constraints()];
        yield 'LocationDetail' => [ModelFixtures::buildLocationDetail(), LocationDetailConstraint::constraints()];
        yield 'ContactAndAddress' => [
            ModelFixtures::buildContactAndAddress(),
            ContactAndAddressConstraint::constraints(),
        ];
        yield 'ContactVO' => [ModelFixtures::buildContactVO(), ContactVOConstraint::constraints()];
        yield 'CustomDeliveryOption' => [
            ModelFixtures::buildCustomDeliveryOption(),
            CustomDeliveryOptionConstraint::constraints(),
        ];
        yield 'RequestedAppointmentDetail' => [
            ModelFixtures::buildRequestedAppointmentDetail(),
            RequestedAppointmentDetailConstraint::constraints(),
        ];
        yield 'TimeWindow' => [ModelFixtures::buildTimeWindow(), TimeWindowConstraint::constraints()];
        yield 'TimeRange' => [ModelFixtures::buildTimeRange(), TimeRangeConstraint::constraints()];
        yield 'PieceCountDetail' => [ModelFixtures::buildPieceCountDetail(), PieceCountDetailConstraint::constraints()];
        yield 'OriginLocation' => [ModelFixtures::buildOriginLocation(), OriginLocationConstraint::constraints()];
        yield 'TrackShipmentDetail' => [
            ModelFixtures::buildTrackShipmentDetail(),
            TrackShipmentDetailConstraint::constraints(),
        ];
        yield 'ShipmentContent' => [ModelFixtures::buildShipmentContent(), ShipmentContentConstraint::constraints()];
        yield 'TrackSplitShipment' => [
            ModelFixtures::buildTrackSplitShipment(),
            TrackSplitShipmentConstraint::constraints(),
        ];
        yield 'Alert' => [ModelFixtures::buildAlert(), AlertConstraint::constraints()];
        yield 'ErrorResponseVO' => [ModelFixtures::buildErrorResponseVO(), ErrorResponseVOConstraint::constraints()];
        yield 'CXSError2' => [ModelFixtures::buildCXSError2(), CXSError2Constraint::constraints()];
        yield 'ErrorResponseVO401' => [
            ModelFixtures::buildErrorResponseVO401(),
            ErrorResponseVO401Constraint::constraints(),
        ];
        yield 'CXSError401' => [ModelFixtures::buildCXSError401(), CXSError401Constraint::constraints()];
        yield 'ErrorResponseVO403' => [
            ModelFixtures::buildErrorResponseVO403(),
            ErrorResponseVO403Constraint::constraints(),
        ];
        yield 'CXSError403' => [ModelFixtures::buildCXSError403(), CXSError403Constraint::constraints()];
        yield 'ErrorResponseVO404' => [
            ModelFixtures::buildErrorResponseVO404(),
            ErrorResponseVO404Constraint::constraints(),
        ];
        yield 'CXSError404' => [ModelFixtures::buildCXSError404(), CXSError404Constraint::constraints()];
        yield 'ErrorResponseVO500' => [
            ModelFixtures::buildErrorResponseVO500(),
            ErrorResponseVO500Constraint::constraints(),
        ];
        yield 'CXSError500' => [ModelFixtures::buildCXSError500(), CXSError500Constraint::constraints()];
        yield 'ErrorResponseVO503' => [
            ModelFixtures::buildErrorResponseVO503(),
            ErrorResponseVO503Constraint::constraints(),
        ];
        yield 'CXSError503' => [ModelFixtures::buildCXSError503(), CXSError503Constraint::constraints()];
        yield 'FullSchemaNotification' => [
            ModelFixtures::buildFullSchemaNotification(),
            FullSchemaNotificationConstraint::constraints(),
        ];
        yield 'TrackingEventNotificationDetail' => [
            ModelFixtures::buildTrackingEventNotificationDetail(),
            TrackingEventNotificationDetailConstraint::constraints(),
        ];
        yield 'TrackingEventNotificationDetail2' => [
            ModelFixtures::buildTrackingEventNotificationDetail2(),
            TrackingEventNotificationDetail2Constraint::constraints(),
        ];
        yield 'TrackingNotification' => [
            ModelFixtures::buildTrackingNotification(),
            TrackingNotificationConstraint::constraints(),
        ];
        yield 'TrackingNotificationDetail' => [
            ModelFixtures::buildTrackingNotificationDetail(),
            TrackingNotificationDetailConstraint::constraints(),
        ];
        yield 'Localization' => [ModelFixtures::buildLocalization(), LocalizationConstraint::constraints()];
        yield 'EmailDetail' => [ModelFixtures::buildEmailDetail(), EmailDetailConstraint::constraints()];
        yield 'TrackingNumberInfo2' => [
            ModelFixtures::buildTrackingNumberInfo2(),
            TrackingNumberInfo2Constraint::constraints(),
        ];
        yield 'TrkcResponseVONotifications' => [
            ModelFixtures::buildTrkcResponseVONotifications(),
            TrkcResponseVONotificationsConstraint::constraints(),
        ];
        yield 'SendNotificationOutputVO' => [
            ModelFixtures::buildSendNotificationOutputVO(),
            SendNotificationOutputVOConstraint::constraints(),
        ];
        yield 'FullSchemaTrackingReferences' => [
            ModelFixtures::buildFullSchemaTrackingReferences(),
            FullSchemaTrackingReferencesConstraint::constraints(),
        ];
        yield 'ReferenceInformation' => [
            ModelFixtures::buildReferenceInformation(),
            ReferenceInformationConstraint::constraints(),
        ];
        yield 'TrkcResponseVOReferenceNumber' => [
            ModelFixtures::buildTrkcResponseVOReferenceNumber(),
            TrkcResponseVOReferenceNumberConstraint::constraints(),
        ];
        yield 'TrackingReferencesResponse' => [
            ModelFixtures::buildTrackingReferencesResponse(),
            TrackingReferencesResponseConstraint::constraints(),
        ];
        yield 'FullSchemaTCN' => [ModelFixtures::buildFullSchemaTCN(), FullSchemaTCNConstraint::constraints()];
        yield 'TCNInfo' => [ModelFixtures::buildTCNInfo(), TCNInfoConstraint::constraints()];
        yield 'TrkcResponseVOTCN' => [
            ModelFixtures::buildTrkcResponseVOTCN(),
            TrkcResponseVOTCNConstraint::constraints(),
        ];
        yield 'TrackingNumbersResponseTCN' => [
            ModelFixtures::buildTrackingNumbersResponseTCN(),
            TrackingNumbersResponseTCNConstraint::constraints(),
        ];
        yield 'Parameter2' => [ModelFixtures::buildParameter2(), Parameter2Constraint::constraints()];
        yield 'FullSchemaSPOD' => [ModelFixtures::buildFullSchemaSPOD(), FullSchemaSPODConstraint::constraints()];
        yield 'TrackDocumentDetail' => [
            ModelFixtures::buildTrackDocumentDetail(),
            TrackDocumentDetailConstraint::constraints(),
        ];
        yield 'TrackDocumentSpecification' => [
            ModelFixtures::buildTrackDocumentSpecification(),
            TrackDocumentSpecificationConstraint::constraints(),
        ];
        yield 'TrkcResponseVOSPOD' => [
            ModelFixtures::buildTrkcResponseVOSPOD(),
            TrkcResponseVOSPODConstraint::constraints(),
        ];
        yield 'SPODResponseVO' => [ModelFixtures::buildSPODResponseVO(), SPODResponseVOConstraint::constraints()];
        yield 'FullSchemaTrackingNumbers' => [
            ModelFixtures::buildFullSchemaTrackingNumbers(),
            FullSchemaTrackingNumbersConstraint::constraints(),
        ];
        yield 'TrackingNumberInfo1' => [
            ModelFixtures::buildTrackingNumberInfo1(),
            TrackingNumberInfo1Constraint::constraints(),
        ];
        yield 'TrkcResponseVOTrackingNumber' => [
            ModelFixtures::buildTrkcResponseVOTrackingNumber(),
            TrkcResponseVOTrackingNumberConstraint::constraints(),
        ];
        yield 'TrackingNumbersResponse' => [
            ModelFixtures::buildTrackingNumbersResponse(),
            TrackingNumbersResponseConstraint::constraints(),
        ];
        yield 'LocationDetailOrigin' => [
            ModelFixtures::buildLocationDetailOrigin(),
            LocationDetailOriginConstraint::constraints(),
        ];
        yield 'LocationDetail1_2' => [
            ModelFixtures::buildLocationDetail12(),
            LocationDetail1_2Constraint::constraints(),
        ];
        yield 'ContactAndAddress1_2' => [
            ModelFixtures::buildContactAndAddress12(),
            ContactAndAddress1_2Constraint::constraints(),
        ];
        yield 'ContactVO1_2' => [ModelFixtures::buildContactVO12(), ContactVO1_2Constraint::constraints()];
        yield 'AddressVO1_2' => [ModelFixtures::buildAddressVO12(), AddressVO1_2Constraint::constraints()];
    }
}
