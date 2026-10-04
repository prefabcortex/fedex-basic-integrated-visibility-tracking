<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Examples\Operations;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedResponseException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ResponseValidationException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TransportException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnsupportedValueException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TCNInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrkcResponseVOTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Option;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\Some;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\PostTrackV1TcnHeaderParameters;

final class PostTrackV1TcnExample
{
    /**
     * Use this endpoint to return tracking information based on a Tracking Control Number.
     *
     * <i>Note: FedEx APIs do not support Cross-Origin Resource Sharing (CORS) mechanism.</i>
     *
     * Usage: pass a Client; this API declares no security scheme.
     *
     *   $client = Client::create($config);
     *   $headerParameters = new PostTrackV1TcnHeaderParameters($authorization);
     *   PostTrackV1TcnExample::postTrackV1Tcn($client, PostTrackV1TcnExample::buildExampleRequestBody(), $headerParameters);
     *
     * @param Option<FullSchemaTCN> $requestBody
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws PostTrackV1TcnBadRequestException
     * @throws PostTrackV1TcnUnauthorizedException
     * @throws PostTrackV1TcnForbiddenException
     * @throws PostTrackV1TcnNotFoundException
     * @throws PostTrackV1TcnInternalServerErrorException
     * @throws PostTrackV1TcnServiceUnavailableException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function postTrackV1Tcn(
        Client $client,
        Option $requestBody,
        PostTrackV1TcnHeaderParameters $headerParameters,
    ): TrkcResponseVOTCN {
        return $client->postTrackV1Tcn(
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
     * @return Option<FullSchemaTCN>
     */
    public static function buildExampleRequestBody(): Option
    {
        $tcnInfo = TCNInfo::builder('N552428361Y555XXX')
            ->setCarrierCode('FDXE')
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return Some::create(FullSchemaTCN::builder($tcnInfo)
            ->setIncludeDetailedScans(true)
            ->build());
    }
}
