<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\StatusAncillaryDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\StatusAncillaryDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class StatusAncillaryDetailFixture
{
    public static function build(): StatusAncillaryDetail
    {
        return StatusAncillaryDetail::builder()
            ->setReason('15')
            ->setReasonDescription('Customer not available or business closed')
            ->setAction('Contact us at <http://www.fedex.com/us/customersupport/call/index.html> to discuss possible delivery or pickup alternatives.')
            ->setActionDescription('Customer not Available or Business Closed')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): StatusAncillaryDetail */
    public static function reader(): callable
    {
        return StatusAncillaryDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return StatusAncillaryDetailConstraint::constraints();
    }
}
