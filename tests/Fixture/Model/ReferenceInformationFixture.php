<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReferenceInformation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ReferenceInformationConstraint;
use Symfony\Component\Validator\Constraint;

final class ReferenceInformationFixture
{
    public static function build(): ReferenceInformation
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

    /** @return callable(array<int|string, mixed>): ReferenceInformation */
    public static function reader(): callable
    {
        return ReferenceInformation::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ReferenceInformationConstraint::constraints();
    }
}
