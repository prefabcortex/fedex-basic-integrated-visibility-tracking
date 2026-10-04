<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Examples\Operations;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedResponseException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ResponseValidationException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TransportException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnsupportedValueException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaSPOD;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentSpecification;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackingNumberInfoCarrierCode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOSPOD;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Option;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Some;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackingDocumentsHeaderParameters;

final class TrackingDocumentsExample
{
    /**
     * This endpoint helps you to request a letter that includes the recipient's signature as a
     * proof of delivery.
     *
     * <i>Note: FedEx APIs do not support Cross-Origin Resource Sharing (CORS) mechanism.</i>
     *
     * Usage: pass a Client; this API declares no security scheme.
     *
     *   $client = Client::create($config);
     *   $headerParameters = new TrackingDocumentsHeaderParameters($authorization);
     *   TrackingDocumentsExample::trackingDocuments($client, TrackingDocumentsExample::buildExampleRequestBody(), $headerParameters);
     *
     * @param Option<FullSchemaSPOD> $requestBody
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws TrackingDocumentsBadRequestException
     * @throws TrackingDocumentsUnauthorizedException
     * @throws TrackingDocumentsForbiddenException
     * @throws TrackingDocumentsNotFoundException
     * @throws TrackingDocumentsInternalServerErrorException
     * @throws TrackingDocumentsServiceUnavailableException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function trackingDocuments(
        Client $client,
        Option $requestBody,
        TrackingDocumentsHeaderParameters $headerParameters,
    ): TrkcResponseVOSPOD {
        return $client->trackingDocuments(
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
     * @return Option<FullSchemaSPOD>
     */
    public static function buildExampleRequestBody(): Option
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

        return Some::create(FullSchemaSPOD::builder(
            // trackDocumentDetail
            $trackDocumentDetail,
            // trackDocumentSpecification
            [$trackDocumentSpecification],
        )->build());
    }
}
