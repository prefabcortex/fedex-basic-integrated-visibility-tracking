<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\RequestedAppointmentDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\RequestedAppointmentDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class RequestedAppointmentDetailFixture
{
    public static function build(): RequestedAppointmentDetail
    {
        return RequestedAppointmentDetail::builder()
            ->setDate('2019-05-07')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): RequestedAppointmentDetail */
    public static function reader(): callable
    {
        return RequestedAppointmentDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return RequestedAppointmentDetailConstraint::constraints();
    }
}
