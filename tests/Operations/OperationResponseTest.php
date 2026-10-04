<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Operations;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Client;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\ClientConfig;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\ApiException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\MalformedDataException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1NotificationUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\PostTrackV1TcnUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByReferencesUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackByTrackingNumberUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackingDocumentsUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentBadRequestException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentForbiddenException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentInternalServerErrorException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentNotFoundException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentServiceUnavailableException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\TrackMultiplePieceShipmentUnauthorizedException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Http\JsonBody;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Http\ValidationMode;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Optional\None;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\PostTrackV1NotificationHeaderParameters;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\PostTrackV1TcnHeaderParameters;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackByReferencesHeaderParameters;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackByTrackingNumberHeaderParameters;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackingDocumentsHeaderParameters;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Parameter\TrackMultiplePieceShipmentHeaderParameters;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\CannedResponse;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\ModelFixtures;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\RecordingHttpClient;
use RuntimeException;

use function sprintf;

/**
 * Every response an operation reads, answered once through the method that reads it.
 *
 * A recorded client answers with the status and content type of one branch and a body built from
 * the model fixtures; the test checks that the model comes back, or the declared exception with the
 * response still readable. A status no response declares and a declared status under the wrong
 * content type are answered too.
 *
 * What this cannot show: that the service sends these documents. They come from the same
 * description the client came from, so this proves the package reads what it promises.
 */
final class OperationResponseTest extends TestCase
{
    private const string BASE_URL = 'https://response-test.invalid';

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrkcResponseVOAssociated());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
        self::assertEquals(ModelFixtures::buildTrkcResponseVOAssociated(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw TrackMultiplePieceShipmentBadRequestException for its %d response',
                    'trackMultiplePieceShipment',
                    400,
                ),
            );
        } catch (TrackMultiplePieceShipmentBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO(), $exception->getErrorResponseVO());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    400,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO401());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw TrackMultiplePieceShipmentUnauthorizedException for its %d response',
                    'trackMultiplePieceShipment',
                    401,
                ),
            );
        } catch (TrackMultiplePieceShipmentUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO401(), $exception->getErrorResponseVO401());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    401,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO403());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw TrackMultiplePieceShipmentForbiddenException for its %d response',
                    'trackMultiplePieceShipment',
                    403,
                ),
            );
        } catch (TrackMultiplePieceShipmentForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO403(), $exception->getErrorResponseVO403());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    403,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads404(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO404());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw TrackMultiplePieceShipmentNotFoundException for its %d response',
                    'trackMultiplePieceShipment',
                    404,
                ),
            );
        } catch (TrackMultiplePieceShipmentNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO404(), $exception->getErrorResponseVO404());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    404,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads500(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO500());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(500, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw TrackMultiplePieceShipmentInternalServerErrorException for its %d response',
                    'trackMultiplePieceShipment',
                    500,
                ),
            );
        } catch (TrackMultiplePieceShipmentInternalServerErrorException $exception) {
            self::assertSame(500, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO500(), $exception->getErrorResponseVO500());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    500,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentReads503(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO503());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(503, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw TrackMultiplePieceShipmentServiceUnavailableException for its %d response',
                    'trackMultiplePieceShipment',
                    503,
                ),
            );
        } catch (TrackMultiplePieceShipmentServiceUnavailableException $exception) {
            self::assertSame(503, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO503(), $exception->getErrorResponseVO503());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    503,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'trackMultiplePieceShipment',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    599,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackMultiplePieceShipmentRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackMultiplePieceShipment(
                None::create(),
                new TrackMultiplePieceShipmentHeaderParameters('smoke-test'),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'trackMultiplePieceShipment',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackMultiplePieceShipment',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrkcResponseVONotifications());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->postTrackV1Notification(
                None::create(),
                new PostTrackV1NotificationHeaderParameters('smoke-test'),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
        self::assertEquals(ModelFixtures::buildTrkcResponseVONotifications(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1NotificationBadRequestException for its %d response',
                    'postTrackV1Notification',
                    400,
                ),
            );
        } catch (PostTrackV1NotificationBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO(), $exception->getErrorResponseVO());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    400,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO401());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1NotificationUnauthorizedException for its %d response',
                    'postTrackV1Notification',
                    401,
                ),
            );
        } catch (PostTrackV1NotificationUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO401(), $exception->getErrorResponseVO401());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    401,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO403());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1NotificationForbiddenException for its %d response',
                    'postTrackV1Notification',
                    403,
                ),
            );
        } catch (PostTrackV1NotificationForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO403(), $exception->getErrorResponseVO403());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    403,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads404(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO404());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1NotificationNotFoundException for its %d response',
                    'postTrackV1Notification',
                    404,
                ),
            );
        } catch (PostTrackV1NotificationNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO404(), $exception->getErrorResponseVO404());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    404,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads500(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO500());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(500, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1NotificationInternalServerErrorException for its %d response',
                    'postTrackV1Notification',
                    500,
                ),
            );
        } catch (PostTrackV1NotificationInternalServerErrorException $exception) {
            self::assertSame(500, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO500(), $exception->getErrorResponseVO500());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    500,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationReads503(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO503());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(503, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1NotificationServiceUnavailableException for its %d response',
                    'postTrackV1Notification',
                    503,
                ),
            );
        } catch (PostTrackV1NotificationServiceUnavailableException $exception) {
            self::assertSame(503, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO503(), $exception->getErrorResponseVO503());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    503,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'postTrackV1Notification',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    599,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1NotificationRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Notification(None::create(), new PostTrackV1NotificationHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'postTrackV1Notification',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'postTrackV1Notification',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrkcResponseVOReferenceNumber());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 200, $error::class, $error->getMessage()),
            );
        }
        self::assertEquals(ModelFixtures::buildTrkcResponseVOReferenceNumber(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByReferencesBadRequestException for its %d response',
                    'trackByReferences',
                    400,
                ),
            );
        } catch (TrackByReferencesBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO(), $exception->getErrorResponseVO());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 400, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO401());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByReferencesUnauthorizedException for its %d response',
                    'trackByReferences',
                    401,
                ),
            );
        } catch (TrackByReferencesUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO401(), $exception->getErrorResponseVO401());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 401, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO403());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByReferencesForbiddenException for its %d response',
                    'trackByReferences',
                    403,
                ),
            );
        } catch (TrackByReferencesForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO403(), $exception->getErrorResponseVO403());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 403, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads404(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO404());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByReferencesNotFoundException for its %d response',
                    'trackByReferences',
                    404,
                ),
            );
        } catch (TrackByReferencesNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO404(), $exception->getErrorResponseVO404());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 404, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads500(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO500());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(500, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByReferencesInternalServerErrorException for its %d response',
                    'trackByReferences',
                    500,
                ),
            );
        } catch (TrackByReferencesInternalServerErrorException $exception) {
            self::assertSame(500, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO500(), $exception->getErrorResponseVO500());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 500, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesReads503(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO503());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(503, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByReferencesServiceUnavailableException for its %d response',
                    'trackByReferences',
                    503,
                ),
            );
        } catch (TrackByReferencesServiceUnavailableException $exception) {
            self::assertSame(503, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO503(), $exception->getErrorResponseVO503());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 503, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'trackByReferences',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 599, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByReferencesRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByReferences(None::create(), new TrackByReferencesHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'trackByReferences',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackByReferences', 200, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrkcResponseVOTCN());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 200, $error::class, $error->getMessage()),
            );
        }
        self::assertEquals(ModelFixtures::buildTrkcResponseVOTCN(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1TcnBadRequestException for its %d response',
                    'postTrackV1Tcn',
                    400,
                ),
            );
        } catch (PostTrackV1TcnBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO(), $exception->getErrorResponseVO());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 400, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO401());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1TcnUnauthorizedException for its %d response',
                    'postTrackV1Tcn',
                    401,
                ),
            );
        } catch (PostTrackV1TcnUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO401(), $exception->getErrorResponseVO401());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 401, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO403());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf('%s did not throw PostTrackV1TcnForbiddenException for its %d response', 'postTrackV1Tcn', 403),
            );
        } catch (PostTrackV1TcnForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO403(), $exception->getErrorResponseVO403());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 403, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads404(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO404());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf('%s did not throw PostTrackV1TcnNotFoundException for its %d response', 'postTrackV1Tcn', 404),
            );
        } catch (PostTrackV1TcnNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO404(), $exception->getErrorResponseVO404());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 404, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads500(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO500());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(500, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1TcnInternalServerErrorException for its %d response',
                    'postTrackV1Tcn',
                    500,
                ),
            );
        } catch (PostTrackV1TcnInternalServerErrorException $exception) {
            self::assertSame(500, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO500(), $exception->getErrorResponseVO500());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 500, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnReads503(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO503());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(503, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw PostTrackV1TcnServiceUnavailableException for its %d response',
                    'postTrackV1Tcn',
                    503,
                ),
            );
        } catch (PostTrackV1TcnServiceUnavailableException $exception) {
            self::assertSame(503, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO503(), $exception->getErrorResponseVO503());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 503, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'postTrackV1Tcn',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 599, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testPostTrackV1TcnRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->postTrackV1Tcn(None::create(), new PostTrackV1TcnHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'postTrackV1Tcn',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'postTrackV1Tcn', 200, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrkcResponseVOSPOD());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 200, $error::class, $error->getMessage()),
            );
        }
        self::assertEquals(ModelFixtures::buildTrkcResponseVOSPOD(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackingDocumentsBadRequestException for its %d response',
                    'trackingDocuments',
                    400,
                ),
            );
        } catch (TrackingDocumentsBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO(), $exception->getErrorResponseVO());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 400, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO401());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackingDocumentsUnauthorizedException for its %d response',
                    'trackingDocuments',
                    401,
                ),
            );
        } catch (TrackingDocumentsUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO401(), $exception->getErrorResponseVO401());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 401, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO403());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackingDocumentsForbiddenException for its %d response',
                    'trackingDocuments',
                    403,
                ),
            );
        } catch (TrackingDocumentsForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO403(), $exception->getErrorResponseVO403());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 403, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads404(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO404());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackingDocumentsNotFoundException for its %d response',
                    'trackingDocuments',
                    404,
                ),
            );
        } catch (TrackingDocumentsNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO404(), $exception->getErrorResponseVO404());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 404, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads500(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO500());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(500, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackingDocumentsInternalServerErrorException for its %d response',
                    'trackingDocuments',
                    500,
                ),
            );
        } catch (TrackingDocumentsInternalServerErrorException $exception) {
            self::assertSame(500, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO500(), $exception->getErrorResponseVO500());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 500, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsReads503(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO503());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(503, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackingDocumentsServiceUnavailableException for its %d response',
                    'trackingDocuments',
                    503,
                ),
            );
        } catch (TrackingDocumentsServiceUnavailableException $exception) {
            self::assertSame(503, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO503(), $exception->getErrorResponseVO503());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 503, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'trackingDocuments',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 599, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackingDocumentsRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackingDocuments(None::create(), new TrackingDocumentsHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'trackingDocuments',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'trackingDocuments', 200, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrkcResponseVOTrackingNumber());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->trackByTrackingNumber(
                None::create(),
                new TrackByTrackingNumberHeaderParameters('smoke-test'),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
        self::assertEquals(ModelFixtures::buildTrkcResponseVOTrackingNumber(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByTrackingNumberBadRequestException for its %d response',
                    'trackByTrackingNumber',
                    400,
                ),
            );
        } catch (TrackByTrackingNumberBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO(), $exception->getErrorResponseVO());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    400,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO401());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByTrackingNumberUnauthorizedException for its %d response',
                    'trackByTrackingNumber',
                    401,
                ),
            );
        } catch (TrackByTrackingNumberUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO401(), $exception->getErrorResponseVO401());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    401,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO403());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByTrackingNumberForbiddenException for its %d response',
                    'trackByTrackingNumber',
                    403,
                ),
            );
        } catch (TrackByTrackingNumberForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO403(), $exception->getErrorResponseVO403());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    403,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads404(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO404());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByTrackingNumberNotFoundException for its %d response',
                    'trackByTrackingNumber',
                    404,
                ),
            );
        } catch (TrackByTrackingNumberNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO404(), $exception->getErrorResponseVO404());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    404,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads500(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO500());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(500, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByTrackingNumberInternalServerErrorException for its %d response',
                    'trackByTrackingNumber',
                    500,
                ),
            );
        } catch (TrackByTrackingNumberInternalServerErrorException $exception) {
            self::assertSame(500, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO500(), $exception->getErrorResponseVO500());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    500,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberReads503(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponseVO503());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(503, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw TrackByTrackingNumberServiceUnavailableException for its %d response',
                    'trackByTrackingNumber',
                    503,
                ),
            );
        } catch (TrackByTrackingNumberServiceUnavailableException $exception) {
            self::assertSame(503, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponseVO503(), $exception->getErrorResponseVO503());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    503,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'trackByTrackingNumber',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    599,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testTrackByTrackingNumberRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->trackByTrackingNumber(None::create(), new TrackByTrackingNumberHeaderParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'trackByTrackingNumber',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'trackByTrackingNumber',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }
}
