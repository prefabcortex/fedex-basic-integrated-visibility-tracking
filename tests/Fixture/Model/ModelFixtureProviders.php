<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SelfNormalizingModel;
use Symfony\Component\Validator\Constraint;

/**
 * The data providers over the fixture classes beside them: one schema-conformant instance of every
 * model in this package, and what each is checked against.
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
            FullSchemaMultiplePieceShipmentFixture::build(),
            FullSchemaMultiplePieceShipmentFixture::reader(),
        ];
        yield 'MasterTrackingInfo' => [MasterTrackingInfoFixture::build(), MasterTrackingInfoFixture::reader()];
        yield 'TrackingInfo' => [TrackingInfoFixture::build(), TrackingInfoFixture::reader()];
        yield 'TrackingNumberInfo' => [TrackingNumberInfoFixture::build(), TrackingNumberInfoFixture::reader()];
        yield 'PagingDetails' => [PagingDetailsFixture::build(), PagingDetailsFixture::reader()];
        yield 'PagingDetails2' => [PagingDetails2Fixture::build(), PagingDetails2Fixture::reader()];
        yield 'TrkcResponseVOAssociated' => [
            TrkcResponseVOAssociatedFixture::build(),
            TrkcResponseVOAssociatedFixture::reader(),
        ];
        yield 'TrackingMPSResponse' => [TrackingMPSResponseFixture::build(), TrackingMPSResponseFixture::reader()];
        yield 'CompleteTrackResult' => [CompleteTrackResultFixture::build(), CompleteTrackResultFixture::reader()];
        yield 'TrackResult' => [TrackResultFixture::build(), TrackResultFixture::reader()];
        yield 'AdditionalTrackingInfo' => [
            AdditionalTrackingInfoFixture::build(),
            AdditionalTrackingInfoFixture::reader(),
        ];
        yield 'PackageIdentifier' => [PackageIdentifierFixture::build(), PackageIdentifierFixture::reader()];
        yield 'Distance' => [DistanceFixture::build(), DistanceFixture::reader()];
        yield 'ConsolidationDetail' => [ConsolidationDetailFixture::build(), ConsolidationDetailFixture::reader()];
        yield 'ReasonDetail' => [ReasonDetailFixture::build(), ReasonDetailFixture::reader()];
        yield 'ReturnDetail' => [ReturnDetailFixture::build(), ReturnDetailFixture::reader()];
        yield 'ServiceDescriptionDetail' => [
            ServiceDescriptionDetailFixture::build(),
            ServiceDescriptionDetailFixture::reader(),
        ];
        yield 'LocationDetail1' => [LocationDetail1Fixture::build(), LocationDetail1Fixture::reader()];
        yield 'ContactAndAddress1' => [ContactAndAddress1Fixture::build(), ContactAndAddress1Fixture::reader()];
        yield 'ContactVO1' => [ContactVO1Fixture::build(), ContactVO1Fixture::reader()];
        yield 'AddressVO1' => [AddressVO1Fixture::build(), AddressVO1Fixture::reader()];
        yield 'StatusDetail' => [StatusDetailFixture::build(), StatusDetailFixture::reader()];
        yield 'AddressVO' => [AddressVOFixture::build(), AddressVOFixture::reader()];
        yield 'StatusAncillaryDetail' => [
            StatusAncillaryDetailFixture::build(),
            StatusAncillaryDetailFixture::reader(),
        ];
        yield 'DelayDetail' => [DelayDetailFixture::build(), DelayDetailFixture::reader()];
        yield 'ServiceCommitMessage' => [ServiceCommitMessageFixture::build(), ServiceCommitMessageFixture::reader()];
        yield 'InformationNoteDetail' => [
            InformationNoteDetailFixture::build(),
            InformationNoteDetailFixture::reader(),
        ];
        yield 'CXSError' => [CXSErrorFixture::build(), CXSErrorFixture::reader()];
        yield 'Parameter' => [ParameterFixture::build(), ParameterFixture::reader()];
        yield 'TrackSpecialHandling' => [TrackSpecialHandlingFixture::build(), TrackSpecialHandlingFixture::reader()];
        yield 'AvailableImagesDetail' => [
            AvailableImagesDetailFixture::build(),
            AvailableImagesDetailFixture::reader(),
        ];
        yield 'DeliveryDetails' => [DeliveryDetailsFixture::build(), DeliveryDetailsFixture::reader()];
        yield 'DeliveryOptionElgibilityDetails' => [
            DeliveryOptionElgibilityDetailsFixture::build(),
            DeliveryOptionElgibilityDetailsFixture::reader(),
        ];
        yield 'ScanEvent' => [ScanEventFixture::build(), ScanEventFixture::reader()];
        yield 'TrackingDateAndTime' => [TrackingDateAndTimeFixture::build(), TrackingDateAndTimeFixture::reader()];
        yield 'PackageDetail' => [PackageDetailFixture::build(), PackageDetailFixture::reader()];
        yield 'PackagingDescription' => [PackagingDescriptionFixture::build(), PackagingDescriptionFixture::reader()];
        yield 'TrackingWeightAndDimensions' => [
            TrackingWeightAndDimensionsFixture::build(),
            TrackingWeightAndDimensionsFixture::reader(),
        ];
        yield 'Weight' => [WeightFixture::build(), WeightFixture::reader()];
        yield 'Dimensions' => [DimensionsFixture::build(), DimensionsFixture::reader()];
        yield 'Amount' => [AmountFixture::build(), AmountFixture::reader()];
        yield 'LocationDetail' => [LocationDetailFixture::build(), LocationDetailFixture::reader()];
        yield 'ContactAndAddress' => [ContactAndAddressFixture::build(), ContactAndAddressFixture::reader()];
        yield 'ContactVO' => [ContactVOFixture::build(), ContactVOFixture::reader()];
        yield 'CustomDeliveryOption' => [CustomDeliveryOptionFixture::build(), CustomDeliveryOptionFixture::reader()];
        yield 'RequestedAppointmentDetail' => [
            RequestedAppointmentDetailFixture::build(),
            RequestedAppointmentDetailFixture::reader(),
        ];
        yield 'TimeWindow' => [TimeWindowFixture::build(), TimeWindowFixture::reader()];
        yield 'TimeRange' => [TimeRangeFixture::build(), TimeRangeFixture::reader()];
        yield 'PieceCountDetail' => [PieceCountDetailFixture::build(), PieceCountDetailFixture::reader()];
        yield 'OriginLocation' => [OriginLocationFixture::build(), OriginLocationFixture::reader()];
        yield 'TrackShipmentDetail' => [TrackShipmentDetailFixture::build(), TrackShipmentDetailFixture::reader()];
        yield 'ShipmentContent' => [ShipmentContentFixture::build(), ShipmentContentFixture::reader()];
        yield 'TrackSplitShipment' => [TrackSplitShipmentFixture::build(), TrackSplitShipmentFixture::reader()];
        yield 'Alert' => [AlertFixture::build(), AlertFixture::reader()];
        yield 'ErrorResponseVO' => [ErrorResponseVOFixture::build(), ErrorResponseVOFixture::reader()];
        yield 'CXSError2' => [CXSError2Fixture::build(), CXSError2Fixture::reader()];
        yield 'ErrorResponseVO401' => [ErrorResponseVO401Fixture::build(), ErrorResponseVO401Fixture::reader()];
        yield 'CXSError401' => [CXSError401Fixture::build(), CXSError401Fixture::reader()];
        yield 'ErrorResponseVO403' => [ErrorResponseVO403Fixture::build(), ErrorResponseVO403Fixture::reader()];
        yield 'CXSError403' => [CXSError403Fixture::build(), CXSError403Fixture::reader()];
        yield 'ErrorResponseVO404' => [ErrorResponseVO404Fixture::build(), ErrorResponseVO404Fixture::reader()];
        yield 'CXSError404' => [CXSError404Fixture::build(), CXSError404Fixture::reader()];
        yield 'ErrorResponseVO500' => [ErrorResponseVO500Fixture::build(), ErrorResponseVO500Fixture::reader()];
        yield 'CXSError500' => [CXSError500Fixture::build(), CXSError500Fixture::reader()];
        yield 'ErrorResponseVO503' => [ErrorResponseVO503Fixture::build(), ErrorResponseVO503Fixture::reader()];
        yield 'CXSError503' => [CXSError503Fixture::build(), CXSError503Fixture::reader()];
        yield 'FullSchemaNotification' => [
            FullSchemaNotificationFixture::build(),
            FullSchemaNotificationFixture::reader(),
        ];
        yield 'TrackingEventNotificationDetail' => [
            TrackingEventNotificationDetailFixture::build(),
            TrackingEventNotificationDetailFixture::reader(),
        ];
        yield 'TrackingEventNotificationDetail2' => [
            TrackingEventNotificationDetail2Fixture::build(),
            TrackingEventNotificationDetail2Fixture::reader(),
        ];
        yield 'TrackingNotification' => [TrackingNotificationFixture::build(), TrackingNotificationFixture::reader()];
        yield 'TrackingNotificationDetail' => [
            TrackingNotificationDetailFixture::build(),
            TrackingNotificationDetailFixture::reader(),
        ];
        yield 'Localization' => [LocalizationFixture::build(), LocalizationFixture::reader()];
        yield 'EmailDetail' => [EmailDetailFixture::build(), EmailDetailFixture::reader()];
        yield 'TrackingNumberInfo2' => [TrackingNumberInfo2Fixture::build(), TrackingNumberInfo2Fixture::reader()];
        yield 'TrkcResponseVONotifications' => [
            TrkcResponseVONotificationsFixture::build(),
            TrkcResponseVONotificationsFixture::reader(),
        ];
        yield 'SendNotificationOutputVO' => [
            SendNotificationOutputVOFixture::build(),
            SendNotificationOutputVOFixture::reader(),
        ];
        yield 'FullSchemaTrackingReferences' => [
            FullSchemaTrackingReferencesFixture::build(),
            FullSchemaTrackingReferencesFixture::reader(),
        ];
        yield 'ReferenceInformation' => [ReferenceInformationFixture::build(), ReferenceInformationFixture::reader()];
        yield 'TrkcResponseVOReferenceNumber' => [
            TrkcResponseVOReferenceNumberFixture::build(),
            TrkcResponseVOReferenceNumberFixture::reader(),
        ];
        yield 'TrackingReferencesResponse' => [
            TrackingReferencesResponseFixture::build(),
            TrackingReferencesResponseFixture::reader(),
        ];
        yield 'FullSchemaTCN' => [FullSchemaTCNFixture::build(), FullSchemaTCNFixture::reader()];
        yield 'TCNInfo' => [TCNInfoFixture::build(), TCNInfoFixture::reader()];
        yield 'TrkcResponseVOTCN' => [TrkcResponseVOTCNFixture::build(), TrkcResponseVOTCNFixture::reader()];
        yield 'TrackingNumbersResponseTCN' => [
            TrackingNumbersResponseTCNFixture::build(),
            TrackingNumbersResponseTCNFixture::reader(),
        ];
        yield 'Parameter2' => [Parameter2Fixture::build(), Parameter2Fixture::reader()];
        yield 'FullSchemaSPOD' => [FullSchemaSPODFixture::build(), FullSchemaSPODFixture::reader()];
        yield 'TrackDocumentDetail' => [TrackDocumentDetailFixture::build(), TrackDocumentDetailFixture::reader()];
        yield 'TrackDocumentSpecification' => [
            TrackDocumentSpecificationFixture::build(),
            TrackDocumentSpecificationFixture::reader(),
        ];
        yield 'TrkcResponseVOSPOD' => [TrkcResponseVOSPODFixture::build(), TrkcResponseVOSPODFixture::reader()];
        yield 'SPODResponseVO' => [SPODResponseVOFixture::build(), SPODResponseVOFixture::reader()];
        yield 'FullSchemaTrackingNumbers' => [
            FullSchemaTrackingNumbersFixture::build(),
            FullSchemaTrackingNumbersFixture::reader(),
        ];
        yield 'TrackingNumberInfo1' => [TrackingNumberInfo1Fixture::build(), TrackingNumberInfo1Fixture::reader()];
        yield 'TrkcResponseVOTrackingNumber' => [
            TrkcResponseVOTrackingNumberFixture::build(),
            TrkcResponseVOTrackingNumberFixture::reader(),
        ];
        yield 'TrackingNumbersResponse' => [
            TrackingNumbersResponseFixture::build(),
            TrackingNumbersResponseFixture::reader(),
        ];
        yield 'LocationDetailOrigin' => [LocationDetailOriginFixture::build(), LocationDetailOriginFixture::reader()];
        yield 'LocationDetail1_2' => [LocationDetail1_2Fixture::build(), LocationDetail1_2Fixture::reader()];
        yield 'ContactAndAddress1_2' => [ContactAndAddress1_2Fixture::build(), ContactAndAddress1_2Fixture::reader()];
        yield 'ContactVO1_2' => [ContactVO1_2Fixture::build(), ContactVO1_2Fixture::reader()];
        yield 'AddressVO1_2' => [AddressVO1_2Fixture::build(), AddressVO1_2Fixture::reader()];
    }

    /**
     * Each model with the wire names its document must carry.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, list<string>}>
     */
    public static function documentsMissingARequiredProperty(): iterable
    {
        yield 'FullSchemaMultiplePieceShipment' => [
            FullSchemaMultiplePieceShipmentFixture::build(),
            FullSchemaMultiplePieceShipmentFixture::reader(),
            ['masterTrackingNumberInfo', 'associatedType'],
        ];
        yield 'MasterTrackingInfo' => [
            MasterTrackingInfoFixture::build(),
            MasterTrackingInfoFixture::reader(),
            ['trackingNumberInfo'],
        ];
        yield 'TrackingInfo' => [TrackingInfoFixture::build(), TrackingInfoFixture::reader(), ['trackingNumberInfo']];
        yield 'TrackingNumberInfo' => [
            TrackingNumberInfoFixture::build(),
            TrackingNumberInfoFixture::reader(),
            ['trackingNumber'],
        ];
        yield 'LocationDetail1' => [
            LocationDetail1Fixture::build(),
            LocationDetail1Fixture::reader(),
            ['locationContactAndAddress', 'locationType'],
        ];
        yield 'ContactAndAddress1' => [
            ContactAndAddress1Fixture::build(),
            ContactAndAddress1Fixture::reader(),
            ['contact', 'address'],
        ];
        yield 'AddressVO1' => [AddressVO1Fixture::build(), AddressVO1Fixture::reader(), ['streetLines', 'countryCode']];
        yield 'AddressVO' => [AddressVOFixture::build(), AddressVOFixture::reader(), ['streetLines', 'countryCode']];
        yield 'LocationDetail' => [
            LocationDetailFixture::build(),
            LocationDetailFixture::reader(),
            ['locationContactAndAddress', 'locationType'],
        ];
        yield 'ContactAndAddress' => [
            ContactAndAddressFixture::build(),
            ContactAndAddressFixture::reader(),
            ['contact', 'address'],
        ];
        yield 'FullSchemaNotification' => [
            FullSchemaNotificationFixture::build(),
            FullSchemaNotificationFixture::reader(),
            ['senderContactName', 'senderEMailAddress', 'trackingEventNotificationDetail', 'trackingNumberInfo'],
        ];
        yield 'TrackingEventNotificationDetail' => [
            TrackingEventNotificationDetailFixture::build(),
            TrackingEventNotificationDetailFixture::reader(),
            ['trackingNotifications'],
        ];
        yield 'TrackingEventNotificationDetail2' => [
            TrackingEventNotificationDetail2Fixture::build(),
            TrackingEventNotificationDetail2Fixture::reader(),
            ['trackingNotifications'],
        ];
        yield 'TrackingNotification' => [
            TrackingNotificationFixture::build(),
            TrackingNotificationFixture::reader(),
            ['notificationDetail', 'notificationEventTypes'],
        ];
        yield 'TrackingNotificationDetail' => [
            TrackingNotificationDetailFixture::build(),
            TrackingNotificationDetailFixture::reader(),
            ['localization', 'emailDetail', 'notificationType'],
        ];
        yield 'Localization' => [LocalizationFixture::build(), LocalizationFixture::reader(), ['languageCode']];
        yield 'EmailDetail' => [EmailDetailFixture::build(), EmailDetailFixture::reader(), ['emailAddress']];
        yield 'TrackingNumberInfo2' => [
            TrackingNumberInfo2Fixture::build(),
            TrackingNumberInfo2Fixture::reader(),
            ['trackingNumber'],
        ];
        yield 'FullSchemaTrackingReferences' => [
            FullSchemaTrackingReferencesFixture::build(),
            FullSchemaTrackingReferencesFixture::reader(),
            ['referencesInformation'],
        ];
        yield 'ReferenceInformation' => [
            ReferenceInformationFixture::build(),
            ReferenceInformationFixture::reader(),
            ['value', 'shipDateBegin', 'shipDateEndDate'],
        ];
        yield 'FullSchemaTCN' => [FullSchemaTCNFixture::build(), FullSchemaTCNFixture::reader(), ['tcnInfo']];
        yield 'TCNInfo' => [TCNInfoFixture::build(), TCNInfoFixture::reader(), ['value']];
        yield 'FullSchemaSPOD' => [
            FullSchemaSPODFixture::build(),
            FullSchemaSPODFixture::reader(),
            ['trackDocumentDetail', 'trackDocumentSpecification'],
        ];
        yield 'TrackDocumentDetail' => [
            TrackDocumentDetailFixture::build(),
            TrackDocumentDetailFixture::reader(),
            ['documentType'],
        ];
        yield 'TrackDocumentSpecification' => [
            TrackDocumentSpecificationFixture::build(),
            TrackDocumentSpecificationFixture::reader(),
            ['trackingNumberInfo'],
        ];
        yield 'FullSchemaTrackingNumbers' => [
            FullSchemaTrackingNumbersFixture::build(),
            FullSchemaTrackingNumbersFixture::reader(),
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
            FullSchemaMultiplePieceShipmentFixture::build(),
            FullSchemaMultiplePieceShipmentFixture::reader(),
            ['masterTrackingNumberInfo' => 'not-an-object', 'associatedType' => 42],
        ];
        yield 'MasterTrackingInfo' => [
            MasterTrackingInfoFixture::build(),
            MasterTrackingInfoFixture::reader(),
            ['trackingNumberInfo' => 'not-an-object'],
        ];
        yield 'TrackingInfo' => [
            TrackingInfoFixture::build(),
            TrackingInfoFixture::reader(),
            ['trackingNumberInfo' => 'not-an-object'],
        ];
        yield 'TrackingNumberInfo' => [
            TrackingNumberInfoFixture::build(),
            TrackingNumberInfoFixture::reader(),
            ['trackingNumber' => 42],
        ];
        yield 'LocationDetail1' => [
            LocationDetail1Fixture::build(),
            LocationDetail1Fixture::reader(),
            ['locationContactAndAddress' => 'not-an-object', 'locationType' => 42],
        ];
        yield 'ContactAndAddress1' => [
            ContactAndAddress1Fixture::build(),
            ContactAndAddress1Fixture::reader(),
            ['contact' => 'not-an-object', 'address' => 'not-an-object'],
        ];
        yield 'AddressVO1' => [
            AddressVO1Fixture::build(),
            AddressVO1Fixture::reader(),
            ['streetLines' => 'not-an-object', 'countryCode' => 42],
        ];
        yield 'AddressVO' => [
            AddressVOFixture::build(),
            AddressVOFixture::reader(),
            ['streetLines' => 'not-an-object', 'countryCode' => 42],
        ];
        yield 'LocationDetail' => [
            LocationDetailFixture::build(),
            LocationDetailFixture::reader(),
            ['locationContactAndAddress' => 'not-an-object', 'locationType' => 42],
        ];
        yield 'ContactAndAddress' => [
            ContactAndAddressFixture::build(),
            ContactAndAddressFixture::reader(),
            ['contact' => 'not-an-object', 'address' => 'not-an-object'],
        ];
        yield 'FullSchemaNotification' => [
            FullSchemaNotificationFixture::build(),
            FullSchemaNotificationFixture::reader(),
            [
                'senderContactName' => 42,
                'senderEMailAddress' => 42,
                'trackingEventNotificationDetail' => 'not-an-object',
                'trackingNumberInfo' => 'not-an-object',
            ],
        ];
        yield 'TrackingEventNotificationDetail' => [
            TrackingEventNotificationDetailFixture::build(),
            TrackingEventNotificationDetailFixture::reader(),
            ['trackingNotifications' => 'not-an-object'],
        ];
        yield 'TrackingEventNotificationDetail2' => [
            TrackingEventNotificationDetail2Fixture::build(),
            TrackingEventNotificationDetail2Fixture::reader(),
            ['trackingNotifications' => 'not-an-object'],
        ];
        yield 'TrackingNotification' => [
            TrackingNotificationFixture::build(),
            TrackingNotificationFixture::reader(),
            ['notificationDetail' => 'not-an-object', 'notificationEventTypes' => 'not-an-object'],
        ];
        yield 'TrackingNotificationDetail' => [
            TrackingNotificationDetailFixture::build(),
            TrackingNotificationDetailFixture::reader(),
            ['localization' => 'not-an-object', 'emailDetail' => 'not-an-object', 'notificationType' => 42],
        ];
        yield 'Localization' => [LocalizationFixture::build(), LocalizationFixture::reader(), ['languageCode' => 42]];
        yield 'EmailDetail' => [EmailDetailFixture::build(), EmailDetailFixture::reader(), ['emailAddress' => 42]];
        yield 'TrackingNumberInfo2' => [
            TrackingNumberInfo2Fixture::build(),
            TrackingNumberInfo2Fixture::reader(),
            ['trackingNumber' => 42],
        ];
        yield 'FullSchemaTrackingReferences' => [
            FullSchemaTrackingReferencesFixture::build(),
            FullSchemaTrackingReferencesFixture::reader(),
            ['referencesInformation' => 'not-an-object'],
        ];
        yield 'ReferenceInformation' => [
            ReferenceInformationFixture::build(),
            ReferenceInformationFixture::reader(),
            ['value' => 42, 'shipDateBegin' => 42, 'shipDateEndDate' => 42],
        ];
        yield 'FullSchemaTCN' => [
            FullSchemaTCNFixture::build(),
            FullSchemaTCNFixture::reader(),
            ['tcnInfo' => 'not-an-object'],
        ];
        yield 'TCNInfo' => [TCNInfoFixture::build(), TCNInfoFixture::reader(), ['value' => 42]];
        yield 'FullSchemaSPOD' => [
            FullSchemaSPODFixture::build(),
            FullSchemaSPODFixture::reader(),
            ['trackDocumentDetail' => 'not-an-object', 'trackDocumentSpecification' => 'not-an-object'],
        ];
        yield 'TrackDocumentDetail' => [
            TrackDocumentDetailFixture::build(),
            TrackDocumentDetailFixture::reader(),
            ['documentType' => 42],
        ];
        yield 'TrackDocumentSpecification' => [
            TrackDocumentSpecificationFixture::build(),
            TrackDocumentSpecificationFixture::reader(),
            ['trackingNumberInfo' => 'not-an-object'],
        ];
        yield 'FullSchemaTrackingNumbers' => [
            FullSchemaTrackingNumbersFixture::build(),
            FullSchemaTrackingNumbersFixture::reader(),
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
            FullSchemaMultiplePieceShipmentFixture::build(),
            FullSchemaMultiplePieceShipmentFixture::constraints(),
        ];
        yield 'MasterTrackingInfo' => [MasterTrackingInfoFixture::build(), MasterTrackingInfoFixture::constraints()];
        yield 'TrackingInfo' => [TrackingInfoFixture::build(), TrackingInfoFixture::constraints()];
        yield 'TrackingNumberInfo' => [TrackingNumberInfoFixture::build(), TrackingNumberInfoFixture::constraints()];
        yield 'PagingDetails' => [PagingDetailsFixture::build(), PagingDetailsFixture::constraints()];
        yield 'PagingDetails2' => [PagingDetails2Fixture::build(), PagingDetails2Fixture::constraints()];
        yield 'TrkcResponseVOAssociated' => [
            TrkcResponseVOAssociatedFixture::build(),
            TrkcResponseVOAssociatedFixture::constraints(),
        ];
        yield 'TrackingMPSResponse' => [TrackingMPSResponseFixture::build(), TrackingMPSResponseFixture::constraints()];
        yield 'CompleteTrackResult' => [CompleteTrackResultFixture::build(), CompleteTrackResultFixture::constraints()];
        yield 'TrackResult' => [TrackResultFixture::build(), TrackResultFixture::constraints()];
        yield 'AdditionalTrackingInfo' => [
            AdditionalTrackingInfoFixture::build(),
            AdditionalTrackingInfoFixture::constraints(),
        ];
        yield 'PackageIdentifier' => [PackageIdentifierFixture::build(), PackageIdentifierFixture::constraints()];
        yield 'Distance' => [DistanceFixture::build(), DistanceFixture::constraints()];
        yield 'ConsolidationDetail' => [ConsolidationDetailFixture::build(), ConsolidationDetailFixture::constraints()];
        yield 'ReasonDetail' => [ReasonDetailFixture::build(), ReasonDetailFixture::constraints()];
        yield 'ReturnDetail' => [ReturnDetailFixture::build(), ReturnDetailFixture::constraints()];
        yield 'ServiceDescriptionDetail' => [
            ServiceDescriptionDetailFixture::build(),
            ServiceDescriptionDetailFixture::constraints(),
        ];
        yield 'LocationDetail1' => [LocationDetail1Fixture::build(), LocationDetail1Fixture::constraints()];
        yield 'ContactAndAddress1' => [ContactAndAddress1Fixture::build(), ContactAndAddress1Fixture::constraints()];
        yield 'ContactVO1' => [ContactVO1Fixture::build(), ContactVO1Fixture::constraints()];
        yield 'AddressVO1' => [AddressVO1Fixture::build(), AddressVO1Fixture::constraints()];
        yield 'StatusDetail' => [StatusDetailFixture::build(), StatusDetailFixture::constraints()];
        yield 'AddressVO' => [AddressVOFixture::build(), AddressVOFixture::constraints()];
        yield 'StatusAncillaryDetail' => [
            StatusAncillaryDetailFixture::build(),
            StatusAncillaryDetailFixture::constraints(),
        ];
        yield 'DelayDetail' => [DelayDetailFixture::build(), DelayDetailFixture::constraints()];
        yield 'ServiceCommitMessage' => [
            ServiceCommitMessageFixture::build(),
            ServiceCommitMessageFixture::constraints(),
        ];
        yield 'InformationNoteDetail' => [
            InformationNoteDetailFixture::build(),
            InformationNoteDetailFixture::constraints(),
        ];
        yield 'CXSError' => [CXSErrorFixture::build(), CXSErrorFixture::constraints()];
        yield 'Parameter' => [ParameterFixture::build(), ParameterFixture::constraints()];
        yield 'TrackSpecialHandling' => [
            TrackSpecialHandlingFixture::build(),
            TrackSpecialHandlingFixture::constraints(),
        ];
        yield 'AvailableImagesDetail' => [
            AvailableImagesDetailFixture::build(),
            AvailableImagesDetailFixture::constraints(),
        ];
        yield 'DeliveryDetails' => [DeliveryDetailsFixture::build(), DeliveryDetailsFixture::constraints()];
        yield 'DeliveryOptionElgibilityDetails' => [
            DeliveryOptionElgibilityDetailsFixture::build(),
            DeliveryOptionElgibilityDetailsFixture::constraints(),
        ];
        yield 'ScanEvent' => [ScanEventFixture::build(), ScanEventFixture::constraints()];
        yield 'TrackingDateAndTime' => [TrackingDateAndTimeFixture::build(), TrackingDateAndTimeFixture::constraints()];
        yield 'PackageDetail' => [PackageDetailFixture::build(), PackageDetailFixture::constraints()];
        yield 'PackagingDescription' => [
            PackagingDescriptionFixture::build(),
            PackagingDescriptionFixture::constraints(),
        ];
        yield 'TrackingWeightAndDimensions' => [
            TrackingWeightAndDimensionsFixture::build(),
            TrackingWeightAndDimensionsFixture::constraints(),
        ];
        yield 'Weight' => [WeightFixture::build(), WeightFixture::constraints()];
        yield 'Dimensions' => [DimensionsFixture::build(), DimensionsFixture::constraints()];
        yield 'Amount' => [AmountFixture::build(), AmountFixture::constraints()];
        yield 'LocationDetail' => [LocationDetailFixture::build(), LocationDetailFixture::constraints()];
        yield 'ContactAndAddress' => [ContactAndAddressFixture::build(), ContactAndAddressFixture::constraints()];
        yield 'ContactVO' => [ContactVOFixture::build(), ContactVOFixture::constraints()];
        yield 'CustomDeliveryOption' => [
            CustomDeliveryOptionFixture::build(),
            CustomDeliveryOptionFixture::constraints(),
        ];
        yield 'RequestedAppointmentDetail' => [
            RequestedAppointmentDetailFixture::build(),
            RequestedAppointmentDetailFixture::constraints(),
        ];
        yield 'TimeWindow' => [TimeWindowFixture::build(), TimeWindowFixture::constraints()];
        yield 'TimeRange' => [TimeRangeFixture::build(), TimeRangeFixture::constraints()];
        yield 'PieceCountDetail' => [PieceCountDetailFixture::build(), PieceCountDetailFixture::constraints()];
        yield 'OriginLocation' => [OriginLocationFixture::build(), OriginLocationFixture::constraints()];
        yield 'TrackShipmentDetail' => [TrackShipmentDetailFixture::build(), TrackShipmentDetailFixture::constraints()];
        yield 'ShipmentContent' => [ShipmentContentFixture::build(), ShipmentContentFixture::constraints()];
        yield 'TrackSplitShipment' => [TrackSplitShipmentFixture::build(), TrackSplitShipmentFixture::constraints()];
        yield 'Alert' => [AlertFixture::build(), AlertFixture::constraints()];
        yield 'ErrorResponseVO' => [ErrorResponseVOFixture::build(), ErrorResponseVOFixture::constraints()];
        yield 'CXSError2' => [CXSError2Fixture::build(), CXSError2Fixture::constraints()];
        yield 'ErrorResponseVO401' => [ErrorResponseVO401Fixture::build(), ErrorResponseVO401Fixture::constraints()];
        yield 'CXSError401' => [CXSError401Fixture::build(), CXSError401Fixture::constraints()];
        yield 'ErrorResponseVO403' => [ErrorResponseVO403Fixture::build(), ErrorResponseVO403Fixture::constraints()];
        yield 'CXSError403' => [CXSError403Fixture::build(), CXSError403Fixture::constraints()];
        yield 'ErrorResponseVO404' => [ErrorResponseVO404Fixture::build(), ErrorResponseVO404Fixture::constraints()];
        yield 'CXSError404' => [CXSError404Fixture::build(), CXSError404Fixture::constraints()];
        yield 'ErrorResponseVO500' => [ErrorResponseVO500Fixture::build(), ErrorResponseVO500Fixture::constraints()];
        yield 'CXSError500' => [CXSError500Fixture::build(), CXSError500Fixture::constraints()];
        yield 'ErrorResponseVO503' => [ErrorResponseVO503Fixture::build(), ErrorResponseVO503Fixture::constraints()];
        yield 'CXSError503' => [CXSError503Fixture::build(), CXSError503Fixture::constraints()];
        yield 'FullSchemaNotification' => [
            FullSchemaNotificationFixture::build(),
            FullSchemaNotificationFixture::constraints(),
        ];
        yield 'TrackingEventNotificationDetail' => [
            TrackingEventNotificationDetailFixture::build(),
            TrackingEventNotificationDetailFixture::constraints(),
        ];
        yield 'TrackingEventNotificationDetail2' => [
            TrackingEventNotificationDetail2Fixture::build(),
            TrackingEventNotificationDetail2Fixture::constraints(),
        ];
        yield 'TrackingNotification' => [
            TrackingNotificationFixture::build(),
            TrackingNotificationFixture::constraints(),
        ];
        yield 'TrackingNotificationDetail' => [
            TrackingNotificationDetailFixture::build(),
            TrackingNotificationDetailFixture::constraints(),
        ];
        yield 'Localization' => [LocalizationFixture::build(), LocalizationFixture::constraints()];
        yield 'EmailDetail' => [EmailDetailFixture::build(), EmailDetailFixture::constraints()];
        yield 'TrackingNumberInfo2' => [TrackingNumberInfo2Fixture::build(), TrackingNumberInfo2Fixture::constraints()];
        yield 'TrkcResponseVONotifications' => [
            TrkcResponseVONotificationsFixture::build(),
            TrkcResponseVONotificationsFixture::constraints(),
        ];
        yield 'SendNotificationOutputVO' => [
            SendNotificationOutputVOFixture::build(),
            SendNotificationOutputVOFixture::constraints(),
        ];
        yield 'FullSchemaTrackingReferences' => [
            FullSchemaTrackingReferencesFixture::build(),
            FullSchemaTrackingReferencesFixture::constraints(),
        ];
        yield 'ReferenceInformation' => [
            ReferenceInformationFixture::build(),
            ReferenceInformationFixture::constraints(),
        ];
        yield 'TrkcResponseVOReferenceNumber' => [
            TrkcResponseVOReferenceNumberFixture::build(),
            TrkcResponseVOReferenceNumberFixture::constraints(),
        ];
        yield 'TrackingReferencesResponse' => [
            TrackingReferencesResponseFixture::build(),
            TrackingReferencesResponseFixture::constraints(),
        ];
        yield 'FullSchemaTCN' => [FullSchemaTCNFixture::build(), FullSchemaTCNFixture::constraints()];
        yield 'TCNInfo' => [TCNInfoFixture::build(), TCNInfoFixture::constraints()];
        yield 'TrkcResponseVOTCN' => [TrkcResponseVOTCNFixture::build(), TrkcResponseVOTCNFixture::constraints()];
        yield 'TrackingNumbersResponseTCN' => [
            TrackingNumbersResponseTCNFixture::build(),
            TrackingNumbersResponseTCNFixture::constraints(),
        ];
        yield 'Parameter2' => [Parameter2Fixture::build(), Parameter2Fixture::constraints()];
        yield 'FullSchemaSPOD' => [FullSchemaSPODFixture::build(), FullSchemaSPODFixture::constraints()];
        yield 'TrackDocumentDetail' => [TrackDocumentDetailFixture::build(), TrackDocumentDetailFixture::constraints()];
        yield 'TrackDocumentSpecification' => [
            TrackDocumentSpecificationFixture::build(),
            TrackDocumentSpecificationFixture::constraints(),
        ];
        yield 'TrkcResponseVOSPOD' => [TrkcResponseVOSPODFixture::build(), TrkcResponseVOSPODFixture::constraints()];
        yield 'SPODResponseVO' => [SPODResponseVOFixture::build(), SPODResponseVOFixture::constraints()];
        yield 'FullSchemaTrackingNumbers' => [
            FullSchemaTrackingNumbersFixture::build(),
            FullSchemaTrackingNumbersFixture::constraints(),
        ];
        yield 'TrackingNumberInfo1' => [TrackingNumberInfo1Fixture::build(), TrackingNumberInfo1Fixture::constraints()];
        yield 'TrkcResponseVOTrackingNumber' => [
            TrkcResponseVOTrackingNumberFixture::build(),
            TrkcResponseVOTrackingNumberFixture::constraints(),
        ];
        yield 'TrackingNumbersResponse' => [
            TrackingNumbersResponseFixture::build(),
            TrackingNumbersResponseFixture::constraints(),
        ];
        yield 'LocationDetailOrigin' => [
            LocationDetailOriginFixture::build(),
            LocationDetailOriginFixture::constraints(),
        ];
        yield 'LocationDetail1_2' => [LocationDetail1_2Fixture::build(), LocationDetail1_2Fixture::constraints()];
        yield 'ContactAndAddress1_2' => [
            ContactAndAddress1_2Fixture::build(),
            ContactAndAddress1_2Fixture::constraints(),
        ];
        yield 'ContactVO1_2' => [ContactVO1_2Fixture::build(), ContactVO1_2Fixture::constraints()];
        yield 'AddressVO1_2' => [AddressVO1_2Fixture::build(), AddressVO1_2Fixture::constraints()];
    }
}
