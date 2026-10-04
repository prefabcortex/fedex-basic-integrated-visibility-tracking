<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Examples\Operations;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedResponseException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ResponseValidationException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TransportException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnsupportedValueException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTrackingNumbers;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOTrackingNumber;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Option;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Some;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackByTrackingNumberHeaderParameters;

final class TrackByTrackingNumberExample
{
    /**
     * This endpoint provides customers package tracking information based on a tracking number for
     * various shipping services.
     *
     * <i>Note: FedEx APIs do not support Cross-Origin Resource Sharing (CORS) mechanism.</i>
     *
     * Usage: pass a Client; this API declares no security scheme.
     *
     *   $client = Client::create($config);
     *   $headerParameters = new TrackByTrackingNumberHeaderParameters($authorization);
     *   TrackByTrackingNumberExample::trackByTrackingNumber($client, TrackByTrackingNumberExample::buildExampleRequestBody(), $headerParameters);
     *
     * @param Option<FullSchemaTrackingNumbers> $requestBody
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws TrackByTrackingNumberBadRequestException
     * @throws TrackByTrackingNumberUnauthorizedException
     * @throws TrackByTrackingNumberForbiddenException
     * @throws TrackByTrackingNumberNotFoundException
     * @throws TrackByTrackingNumberInternalServerErrorException
     * @throws TrackByTrackingNumberServiceUnavailableException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function trackByTrackingNumber(
        Client $client,
        Option $requestBody,
        TrackByTrackingNumberHeaderParameters $headerParameters,
    ): TrkcResponseVOTrackingNumber {
        return $client->trackByTrackingNumber(
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
     * @return Option<FullSchemaTrackingNumbers>
     */
    public static function buildExampleRequestBody(): Option
    {
        $trackingNumberInfo = TrackingNumberInfo::builder('128667043726')
            ->setCarrierCode(TrackingNumberInfoCarrierCode::FDXE)
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
        $trackingInfo = TrackingInfo::builder($trackingNumberInfo)
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return Some::create(FullSchemaTrackingNumbers::builder(
            // includeDetailedScans
            true,
            // trackingInfo
            [$trackingInfo],
        )->build());
    }
}
