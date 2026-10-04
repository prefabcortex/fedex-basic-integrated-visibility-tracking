<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Examples\Operations;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedResponseException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ResponseValidationException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TransportException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnsupportedValueException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTrackingReferences;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReferenceInformation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOReferenceNumber;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Option;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Some;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackByReferencesHeaderParameters;

final class TrackByReferencesExample
{
    /**
     * This endpoint returns tracking information based on alternate references other than Tracking
     * Number such as Customer reference numbers, etc.
     *
     * <i>Note: FedEx APIs do not support Cross-Origin Resource Sharing (CORS) mechanism.</i>
     *
     * Usage: pass a Client; this API declares no security scheme.
     *
     *   $client = Client::create($config);
     *   $headerParameters = new TrackByReferencesHeaderParameters($authorization);
     *   TrackByReferencesExample::trackByReferences($client, TrackByReferencesExample::buildExampleRequestBody(), $headerParameters);
     *
     * @param Option<FullSchemaTrackingReferences> $requestBody
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws TrackByReferencesBadRequestException
     * @throws TrackByReferencesUnauthorizedException
     * @throws TrackByReferencesForbiddenException
     * @throws TrackByReferencesNotFoundException
     * @throws TrackByReferencesInternalServerErrorException
     * @throws TrackByReferencesServiceUnavailableException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function trackByReferences(
        Client $client,
        Option $requestBody,
        TrackByReferencesHeaderParameters $headerParameters,
    ): TrkcResponseVOReferenceNumber {
        return $client->trackByReferences(
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
     * @return Option<FullSchemaTrackingReferences>
     */
    public static function buildExampleRequestBody(): Option
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

        return Some::create(FullSchemaTrackingReferences::builder($referencesInformation)
            ->setIncludeDetailedScans(true)
            ->build());
    }
}
