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
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AvailableImagesDetailSize;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AvailableImagesDetailType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CompleteTrackResult;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ConsolidationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CustomDeliveryOption;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CustomDeliveryOptionType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError401;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError403;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError404;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError500;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\CXSError503;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetailStatus;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetailSubType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DelayDetailType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryDetailsLocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryOptionElgibilityDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DeliveryOptionElgibilityDetailsOption;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Dimensions;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DimensionsUnits;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Distance;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\DistanceUnits;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO401;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO403;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO404;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO500;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ErrorResponseVO503;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipment;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipmentAssociatedType;
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
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1LocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1LocationTypeEnum;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetailLocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetailOrigin;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\MasterTrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\OriginLocation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageIdentifier;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageIdentifierType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackagingDescription;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PagingDetails;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PagingDetails2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Parameter;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Parameter2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PieceCountDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PieceCountDetailType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReasonDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReferenceInformation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\RequestedAppointmentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReturnDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ScanEvent;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ScanEventLocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SendNotificationOutputVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceCommitMessage;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceCommitMessageType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceDescriptionDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ShipmentContent;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SPODResponseVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\StatusAncillaryDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\StatusDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TCNInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeRange;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeWindow;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TimeWindowType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentSpecification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingDateAndTime;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingDateAndTimeType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingEventNotificationDetail2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingMPSResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNotificationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo1CarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo2CarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
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
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\WeightUnit;

final class ModelFixtures
{
    public static function buildFullSchemaMultiplePieceShipment(): FullSchemaMultiplePieceShipment
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $masterTrackingNumberInfo = MasterTrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return FullSchemaMultiplePieceShipment::builder(
            // masterTrackingNumberInfo
            $masterTrackingNumberInfo,
            // associatedType
            FullSchemaMultiplePieceShipmentAssociatedType::STANDARD_MPS,
        )
            ->setIncludeDetailedScans(true)
            ->build();
    }

    public static function buildMasterTrackingInfo(): MasterTrackingInfo
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();

        return MasterTrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();
    }

    public static function buildTrackingInfo(): TrackingInfo
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();

        return TrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();
    }

    public static function buildTrackingNumberInfo(): TrackingNumberInfo
    {
        return TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    public static function buildPagingDetails(): PagingDetails
    {
        return PagingDetails::builder()
            ->setResultsPerPage(56)
            ->setPagingToken('38903279038')
            ->build();
    }

    public static function buildPagingDetails2(): PagingDetails2
    {
        return PagingDetails2::builder()
            ->setResultsPerPage(56)
            ->setPagingToken('38903279038')
            ->build();
    }

    public static function buildTrkcResponseVOAssociated(): TrkcResponseVOAssociated
    {
        return TrkcResponseVOAssociated::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildTrackingMPSResponse(): TrackingMPSResponse
    {
        $alert = Alert::builder()->build();

        return TrackingMPSResponse::builder()
            ->setAlerts([$alert])
            ->build();
    }

    public static function buildCompleteTrackResult(): CompleteTrackResult
    {
        return CompleteTrackResult::builder()
            ->setTrackingNumber('123456789012')
            ->build();
    }

    public static function buildTrackResult(): TrackResult
    {
        return TrackResult::builder()
            ->setMeterNumber('8468376')
            ->setGoodsClassificationCode('goodsClassificationCode')
            ->setAvailableNotifications(['REPLACE_ME'])
            ->build();
    }

    public static function buildAdditionalTrackingInfo(): AdditionalTrackingInfo
    {
        return AdditionalTrackingInfo::builder()
            ->setHasAssociatedShipments(false)
            ->setNickname('shipment nickname')
            ->setShipmentNotes('shipment notes')
            ->build();
    }

    public static function buildPackageIdentifier(): PackageIdentifier
    {
        return PackageIdentifier::builder()
            ->setType(PackageIdentifierType::SHIPPER_REFERENCE)
            ->setValue(['REPLACE_ME'])
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    public static function buildDistance(): Distance
    {
        return Distance::builder()
            ->setUnits(DistanceUnits::KM)
            ->setValue(685.7)
            ->build();
    }

    public static function buildConsolidationDetail(): ConsolidationDetail
    {
        return ConsolidationDetail::builder()
            ->setTimeStamp('2020-10-13T03:54:44-06:00')
            ->setConsolidationID('47936927')
            ->setPackageCount(25)
            ->setEventType('PACKAGE_ADDED_TO_CONSOLIDATION')
            ->build();
    }

    public static function buildReasonDetail(): ReasonDetail
    {
        return ReasonDetail::builder()
            ->setDescription('Wrong color')
            ->setType('REJECTED')
            ->build();
    }

    public static function buildReturnDetail(): ReturnDetail
    {
        return ReturnDetail::builder()
            ->setAuthorizationName('Sammy Smith')
            ->build();
    }

    public static function buildServiceDescriptionDetail(): ServiceDescriptionDetail
    {
        return ServiceDescriptionDetail::builder()
            ->setDescription('FedEx Freight Economy.')
            ->setShortDescription('FL')
            ->setType('FEDEX_FREIGHT_ECONOMY')
            ->build();
    }

    public static function buildLocationDetail1(): LocationDetail1
    {
        $contact = ContactVO1::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO1::builder(
            // streetLines
            ['REPLACE_ME'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->build();
        $locationContactAndAddress = ContactAndAddress1::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();

        return LocationDetail1::builder(
            // locationContactAndAddress
            $locationContactAndAddress,
            // locationType
            LocationDetail1LocationType::FEDEX_AUTHORIZED_SHIP_CENTER,
        )
            ->setLocationId('SEA')
            ->build();
    }

    public static function buildContactAndAddress1(): ContactAndAddress1
    {
        $contact = ContactVO1::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO1::builder(
            // streetLines
            ['REPLACE_ME'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->build();

        return ContactAndAddress1::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();
    }

    public static function buildContactVO1(): ContactVO1
    {
        return ContactVO1::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
    }

    public static function buildAddressVO1(): AddressVO1
    {
        return AddressVO1::builder(
            // streetLines
            ['REPLACE_ME'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->build();
    }

    public static function buildStatusDetail(): StatusDetail
    {
        return StatusDetail::builder()
            ->setCode('PU')
            ->setDerivedCode('PU')
            ->setStatusByLocale('Picked up')
            ->setDescription('Picked up')
            ->build();
    }

    public static function buildAddressVO(): AddressVO
    {
        return AddressVO::builder(
            // streetLines
            ['REPLACE_ME'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->setCountryName('United States')
            ->build();
    }

    public static function buildStatusAncillaryDetail(): StatusAncillaryDetail
    {
        return StatusAncillaryDetail::builder()
            ->setReason('15')
            ->setReasonDescription('Customer not available or business closed')
            ->setAction('Contact us at <http://www.fedex.com/us/customersupport/call/index.html> to discuss possible delivery or pickup alternatives.')
            ->setActionDescription('Customer not Available or Business Closed')
            ->build();
    }

    public static function buildDelayDetail(): DelayDetail
    {
        return DelayDetail::builder()
            ->setType(DelayDetailType::WEATHER)
            ->setSubType(DelayDetailSubType::SNOW)
            ->setStatus(DelayDetailStatus::DELAYED)
            ->build();
    }

    public static function buildServiceCommitMessage(): ServiceCommitMessage
    {
        return ServiceCommitMessage::builder()
            ->setMessage('No scheduled delivery date available at this time.')
            ->setType(ServiceCommitMessageType::ESTIMATED_DELIVERY_DATE_UNAVAILABLE)
            ->build();
    }

    public static function buildInformationNoteDetail(): InformationNoteDetail
    {
        return InformationNoteDetail::builder()
            ->setCode('CLEARANCE_ENTRY_FEE_APPLIES')
            ->setDescription('this is an informational message')
            ->build();
    }

    public static function buildCXSError(): CXSError
    {
        return CXSError::builder()
            ->setCode('TRACKING.TRACKINGNUMBER.EMPTY')
            ->setMessage('Please provide tracking number.')
            ->build();
    }

    public static function buildParameter(): Parameter
    {
        return Parameter::builder()
            ->setValue('value')
            ->setKey('key')
            ->build();
    }

    public static function buildTrackSpecialHandling(): TrackSpecialHandling
    {
        return TrackSpecialHandling::builder()
            ->setDescription('Deliver Weekday')
            ->setType('DELIVER_WEEKDAY')
            ->setPaymentType('OTHER')
            ->build();
    }

    public static function buildAvailableImagesDetail(): AvailableImagesDetail
    {
        return AvailableImagesDetail::builder()
            ->setSize(AvailableImagesDetailSize::LARGE)
            ->setType(AvailableImagesDetailType::BILL_OF_LADING)
            ->build();
    }

    public static function buildDeliveryDetails(): DeliveryDetails
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

    public static function buildDeliveryOptionElgibilityDetails(): DeliveryOptionElgibilityDetails
    {
        return DeliveryOptionElgibilityDetails::builder()
            ->setOption(DeliveryOptionElgibilityDetailsOption::INDIRECT_SIGNATURE_RELEASE)
            ->setEligibility('INELIGIBLE')
            ->build();
    }

    public static function buildScanEvent(): ScanEvent
    {
        return ScanEvent::builder()
            ->setDate('2018-02-02T12:01:00-07:00')
            ->setDerivedStatus('Picked Up')
            ->setLocationId('SEA')
            ->setLocationType(ScanEventLocationType::CUSTOMS_BROKER)
            ->setExceptionDescription('Package available for clearance')
            ->setEventDescription('Picked Up')
            ->setEventType('PU')
            ->setDerivedStatusCode('PU')
            ->setExceptionCode('A25')
            ->build();
    }

    public static function buildTrackingDateAndTime(): TrackingDateAndTime
    {
        return TrackingDateAndTime::builder()
            ->setDateTime('2007-09-27T00:00:00')
            ->setType(TrackingDateAndTimeType::ACTUAL_DELIVERY)
            ->build();
    }

    public static function buildPackageDetail(): PackageDetail
    {
        return PackageDetail::builder()
            ->setPhysicalPackagingType('BARREL')
            ->setSequenceNumber('45')
            ->setUndeliveredCount('7')
            ->setCount('1')
            ->setPackageContent(['REPLACE_ME'])
            ->setContentPieceCount('100')
            ->build();
    }

    public static function buildPackagingDescription(): PackagingDescription
    {
        return PackagingDescription::builder()
            ->setDescription('FedEx Pak')
            ->setType('FEDEX_PAK')
            ->build();
    }

    public static function buildTrackingWeightAndDimensions(): TrackingWeightAndDimensions
    {
        return TrackingWeightAndDimensions::builder()->build();
    }

    public static function buildWeight(): Weight
    {
        return Weight::builder()
            ->setUnit(WeightUnit::LB)
            ->setValue('22222.0')
            ->build();
    }

    public static function buildDimensions(): Dimensions
    {
        return Dimensions::builder()
            ->setLength(100)
            ->setWidth(50)
            ->setHeight(30)
            ->setUnits(DimensionsUnits::CM)
            ->build();
    }

    public static function buildAmount(): Amount
    {
        return Amount::builder()
            ->setCurrency('USD')
            ->setValue(56.8)
            ->build();
    }

    public static function buildLocationDetail(): LocationDetail
    {
        $contact = ContactVO::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO::builder(
            // streetLines
            ['REPLACE_ME'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->setCountryName('United States')
            ->build();
        $locationContactAndAddress = ContactAndAddress::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();

        return LocationDetail::builder(
            // locationContactAndAddress
            $locationContactAndAddress,
            // locationType
            LocationDetailLocationType::FEDEX_AUTHORIZED_SHIP_CENTER,
        )
            ->setLocationId('SEA')
            ->build();
    }

    public static function buildContactAndAddress(): ContactAndAddress
    {
        $contact = ContactVO::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO::builder(
            // streetLines
            ['REPLACE_ME'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->setCountryName('United States')
            ->build();

        return ContactAndAddress::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();
    }

    public static function buildContactVO(): ContactVO
    {
        return ContactVO::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
    }

    public static function buildCustomDeliveryOption(): CustomDeliveryOption
    {
        return CustomDeliveryOption::builder()
            ->setDescription('Redirect the package to the hold location.')
            ->setType(CustomDeliveryOptionType::REDIRECT_TO_HOLD_AT_LOCATION)
            ->setStatus('HELD')
            ->build();
    }

    public static function buildRequestedAppointmentDetail(): RequestedAppointmentDetail
    {
        return RequestedAppointmentDetail::builder()
            ->setDate('2019-05-07')
            ->build();
    }

    public static function buildTimeWindow(): TimeWindow
    {
        return TimeWindow::builder()
            ->setDescription('Description field')
            ->setType(TimeWindowType::ESTIMATED_DELIVERY)
            ->build();
    }

    public static function buildTimeRange(): TimeRange
    {
        return TimeRange::builder()
            ->setBegins('2021-10-01T08:00:00')
            ->setEnds('2021-10-15T00:00:00-06:00')
            ->build();
    }

    public static function buildPieceCountDetail(): PieceCountDetail
    {
        return PieceCountDetail::builder()
            ->setCount('35')
            ->setDescription('picec count description')
            ->setType(PieceCountDetailType::ORIGIN)
            ->build();
    }

    public static function buildOriginLocation(): OriginLocation
    {
        return OriginLocation::builder()
            ->setLocationId('SEA')
            ->build();
    }

    public static function buildTrackShipmentDetail(): TrackShipmentDetail
    {
        return TrackShipmentDetail::builder()
            ->setBeforePossessionStatus(false)
            ->setContentPieceCount('3333')
            ->build();
    }

    public static function buildShipmentContent(): ShipmentContent
    {
        return ShipmentContent::builder()
            ->setItemNumber('RZ5678')
            ->setReceivedQuantity('13')
            ->setDescription('pulyurethane rope')
            ->setPartNumber('RK1345')
            ->build();
    }

    public static function buildTrackSplitShipment(): TrackSplitShipment
    {
        return TrackSplitShipment::builder()
            ->setPieceCount('10')
            ->setStatusDescription('status')
            ->setTimestamp('2019-05-07T08:00:07')
            ->setStatusCode('statuscode')
            ->build();
    }

    public static function buildAlert(): Alert
    {
        return Alert::builder()->build();
    }

    public static function buildErrorResponseVO(): ErrorResponseVO
    {
        return ErrorResponseVO::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildCXSError2(): CXSError2
    {
        return CXSError2::builder()->build();
    }

    public static function buildErrorResponseVO401(): ErrorResponseVO401
    {
        return ErrorResponseVO401::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    public static function buildCXSError401(): CXSError401
    {
        return CXSError401::builder()->build();
    }

    public static function buildErrorResponseVO403(): ErrorResponseVO403
    {
        return ErrorResponseVO403::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    public static function buildCXSError403(): CXSError403
    {
        return CXSError403::builder()->build();
    }

    public static function buildErrorResponseVO404(): ErrorResponseVO404
    {
        return ErrorResponseVO404::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    public static function buildCXSError404(): CXSError404
    {
        return CXSError404::builder()->build();
    }

    public static function buildErrorResponseVO500(): ErrorResponseVO500
    {
        return ErrorResponseVO500::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildCXSError500(): CXSError500
    {
        return CXSError500::builder()->build();
    }

    public static function buildErrorResponseVO503(): ErrorResponseVO503
    {
        return ErrorResponseVO503::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->build();
    }

    public static function buildCXSError503(): CXSError503
    {
        return CXSError503::builder()->build();
    }

    public static function buildFullSchemaNotification(): FullSchemaNotification
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
            ['REPLACE_ME'],
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

    public static function buildTrackingEventNotificationDetail(): TrackingEventNotificationDetail
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
            ['REPLACE_ME'],
        )
            ->setRole('SHIPPER')
            ->setCurrentResultRequestedFlag(true)
            ->build();

        return TrackingEventNotificationDetail::builder([$trackingNotification])
            ->setPersonalMessage('Personal message content')
            ->build();
    }

    public static function buildTrackingEventNotificationDetail2(): TrackingEventNotificationDetail2
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
            ['REPLACE_ME'],
        )
            ->setRole('SHIPPER')
            ->setCurrentResultRequestedFlag(true)
            ->build();

        return TrackingEventNotificationDetail2::builder([$trackingNotification])
            ->setPersonalMessage('Personal message content')
            ->build();
    }

    public static function buildTrackingNotification(): TrackingNotification
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

        return TrackingNotification::builder(
            // notificationDetail
            $notificationDetail,
            // notificationEventTypes
            ['REPLACE_ME'],
        )
            ->setRole('SHIPPER')
            ->setCurrentResultRequestedFlag(true)
            ->build();
    }

    public static function buildTrackingNotificationDetail(): TrackingNotificationDetail
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

    public static function buildLocalization(): Localization
    {
        return Localization::builder('en')
            ->setLocaleCode('US')
            ->build();
    }

    public static function buildEmailDetail(): EmailDetail
    {
        return EmailDetail::builder('p1@fedex.com')
            ->setName('Preethi')
            ->build();
    }

    public static function buildTrackingNumberInfo2(): TrackingNumberInfo2
    {
        return TrackingNumberInfo2::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfo2CarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    public static function buildTrkcResponseVONotifications(): TrkcResponseVONotifications
    {
        return TrkcResponseVONotifications::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildSendNotificationOutputVO(): SendNotificationOutputVO
    {
        $alert = Alert::builder()->build();

        return SendNotificationOutputVO::builder()
            ->setAlerts([$alert])
            ->build();
    }

    public static function buildFullSchemaTrackingReferences(): FullSchemaTrackingReferences
    {
        $referencesInformation = ReferenceInformation::builder(
            // value
            '56754674567546754',
            // shipDateBegin
            '2020-03-29',
            // shipDateEndDate
            '2020-04-01',
        )
            ->setCarrierCode('FDXE')
            ->setType(' BILL_OF_LADING')
            ->setAccountNumber('XXX61073')
            ->setDestinationCountryCode('US')
            ->setDestinationPostalCode('75063')
            ->build();

        return FullSchemaTrackingReferences::builder($referencesInformation)
            ->setIncludeDetailedScans(true)
            ->build();
    }

    public static function buildReferenceInformation(): ReferenceInformation
    {
        return ReferenceInformation::builder(
            // value
            '56754674567546754',
            // shipDateBegin
            '2020-03-29',
            // shipDateEndDate
            '2020-04-01',
        )
            ->setCarrierCode('FDXE')
            ->setType(' BILL_OF_LADING')
            ->setAccountNumber('XXX61073')
            ->setDestinationCountryCode('US')
            ->setDestinationPostalCode('75063')
            ->build();
    }

    public static function buildTrkcResponseVOReferenceNumber(): TrkcResponseVOReferenceNumber
    {
        return TrkcResponseVOReferenceNumber::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildTrackingReferencesResponse(): TrackingReferencesResponse
    {
        $alert = Alert::builder()->build();

        return TrackingReferencesResponse::builder()
            ->setAlerts([$alert])
            ->build();
    }

    public static function buildFullSchemaTCN(): FullSchemaTCN
    {
        $tcnInfo = TCNInfo::builder('N552428361Y555XXX')
            ->setCarrierCode('FDXE')
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return FullSchemaTCN::builder($tcnInfo)
            ->setIncludeDetailedScans(true)
            ->build();
    }

    public static function buildTCNInfo(): TCNInfo
    {
        return TCNInfo::builder('N552428361Y555XXX')
            ->setCarrierCode('FDXE')
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();
    }

    public static function buildTrkcResponseVOTCN(): TrkcResponseVOTCN
    {
        return TrkcResponseVOTCN::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildTrackingNumbersResponseTCN(): TrackingNumbersResponseTCN
    {
        $alert = Alert::builder()->build();

        return TrackingNumbersResponseTCN::builder()
            ->setAlerts([$alert])
            ->build();
    }

    public static function buildParameter2(): Parameter2
    {
        return Parameter2::builder()
            ->setValue('value')
            ->setKey('key')
            ->build();
    }

    public static function buildFullSchemaSPOD(): FullSchemaSPOD
    {
        $trackDocumentDetail = TrackDocumentDetail::builder('SIGNATURE_PROOF_OF_DELIVERY')
            ->setDocumentFormat('PNG')
            ->build();
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $trackDocumentSpecification = TrackDocumentSpecification::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->setAccountNumber('XXX61073')
            ->build();

        return FullSchemaSPOD::builder(
            // trackDocumentDetail
            $trackDocumentDetail,
            // trackDocumentSpecification
            [$trackDocumentSpecification],
        )->build();
    }

    public static function buildTrackDocumentDetail(): TrackDocumentDetail
    {
        return TrackDocumentDetail::builder('SIGNATURE_PROOF_OF_DELIVERY')
            ->setDocumentFormat('PNG')
            ->build();
    }

    public static function buildTrackDocumentSpecification(): TrackDocumentSpecification
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();

        return TrackDocumentSpecification::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->setAccountNumber('XXX61073')
            ->build();
    }

    public static function buildTrkcResponseVOSPOD(): TrkcResponseVOSPOD
    {
        return TrkcResponseVOSPOD::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildSPODResponseVO(): SPODResponseVO
    {
        $alert = Alert::builder()->build();

        return SPODResponseVO::builder()
            ->setDocumentFormat('PNG')
            ->setAlerts([$alert])
            ->build();
    }

    public static function buildFullSchemaTrackingNumbers(): FullSchemaTrackingNumbers
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $trackingInfo = TrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return FullSchemaTrackingNumbers::builder(
            // includeDetailedScans
            true,
            // trackingInfo
            [$trackingInfo],
        )->build();
    }

    public static function buildTrackingNumberInfo1(): TrackingNumberInfo1
    {
        return TrackingNumberInfo1::builder()
            ->setTrackingNumber('128667043726')
            ->setCarrierCode(TrackingNumberInfo1CarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    public static function buildTrkcResponseVOTrackingNumber(): TrkcResponseVOTrackingNumber
    {
        return TrkcResponseVOTrackingNumber::builder()
            ->setTransactionId('624deea6-b709-470c-8c39-4b5511281492')
            ->setCustomerTransactionId('AnyCo_order123456789')
            ->build();
    }

    public static function buildTrackingNumbersResponse(): TrackingNumbersResponse
    {
        $alert = Alert::builder()->build();

        return TrackingNumbersResponse::builder()
            ->setAlerts([$alert])
            ->build();
    }

    public static function buildLocationDetailOrigin(): LocationDetailOrigin
    {
        return LocationDetailOrigin::builder()
            ->setLocationId('SEA')
            ->build();
    }

    public static function buildLocationDetail12(): LocationDetail1_2
    {
        return LocationDetail1_2::builder()
            ->setLocationId('SEA')
            ->setLocationType(LocationDetail1LocationTypeEnum::FEDEX_SHIPSITE)
            ->build();
    }

    public static function buildContactAndAddress12(): ContactAndAddress1_2
    {
        return ContactAndAddress1_2::builder()->build();
    }

    public static function buildContactVO12(): ContactVO1_2
    {
        return ContactVO1_2::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
    }

    public static function buildAddressVO12(): AddressVO1_2
    {
        return AddressVO1_2::builder()
            ->setAddressClassification('BUSINESS')
            ->setResidential(false)
            ->setStreetLines(['REPLACE_ME'])
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->setCountryCode('US')
            ->setCountryName('United States')
            ->build();
    }
}
