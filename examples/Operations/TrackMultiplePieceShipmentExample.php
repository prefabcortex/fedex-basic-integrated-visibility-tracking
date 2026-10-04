<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Examples\Operations;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedResponseException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ResponseValidationException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TransportException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnsupportedValueException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipment;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaMultiplePieceShipmentAssociatedType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\MasterTrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOAssociated;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Option;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Some;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackMultiplePieceShipmentHeaderParameters;

final class TrackMultiplePieceShipmentExample
{
    /**
     * This endpoint returns tracking information for multiplee piece shipments, Group MPS, or an
     * outbounddd shipment which is linked to a return shipment.
     *
     * <i>Note: FedEx APIs do not support Cross-Origin Resource Sharing (CORS) mechanism.</i>
     *
     * Usage: pass a Client; this API declares no security scheme.
     *
     *   $client = Client::create($config);
     *   $headerParameters = new TrackMultiplePieceShipmentHeaderParameters($authorization);
     *   TrackMultiplePieceShipmentExample::trackMultiplePieceShipment($client, TrackMultiplePieceShipmentExample::buildExampleRequestBody(), $headerParameters);
     *
     * @param Option<FullSchemaMultiplePieceShipment> $requestBody
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws TrackMultiplePieceShipmentBadRequestException
     * @throws TrackMultiplePieceShipmentUnauthorizedException
     * @throws TrackMultiplePieceShipmentForbiddenException
     * @throws TrackMultiplePieceShipmentNotFoundException
     * @throws TrackMultiplePieceShipmentInternalServerErrorException
     * @throws TrackMultiplePieceShipmentServiceUnavailableException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function trackMultiplePieceShipment(
        Client $client,
        Option $requestBody,
        TrackMultiplePieceShipmentHeaderParameters $headerParameters,
    ): TrkcResponseVOAssociated {
        return $client->trackMultiplePieceShipment(
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
     * @return Option<FullSchemaMultiplePieceShipment>
     */
    public static function buildExampleRequestBody(): Option
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $masterTrackingNumberInfo = MasterTrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return Some::create(FullSchemaMultiplePieceShipment::builder(
            // masterTrackingNumberInfo
            $masterTrackingNumberInfo,
            // associatedType
            FullSchemaMultiplePieceShipmentAssociatedType::STANDARD_MPS,
        )
            ->setIncludeDetailedScans(true)
            ->build());
    }
}
