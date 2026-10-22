<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TrackDocumentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TrackDocumentDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackDocumentDetailFixture
{
    public static function build(): TrackDocumentDetail
    {
        return TrackDocumentDetail::builder('SIGNATURE_PROOF_OF_DELIVERY')
            ->setDocumentFormat('PNG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackDocumentDetail */
    public static function reader(): callable
    {
        return TrackDocumentDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackDocumentDetailConstraint::constraints();
    }
}
