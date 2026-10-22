<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTrackingReferences;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ReferenceInformation;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaTrackingReferencesConstraint;
use Symfony\Component\Validator\Constraint;

final class FullSchemaTrackingReferencesFixture
{
    public static function build(): FullSchemaTrackingReferences
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

        return FullSchemaTrackingReferences::builder($referencesInformation)
            ->setIncludeDetailedScans(true)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): FullSchemaTrackingReferences */
    public static function reader(): callable
    {
        return FullSchemaTrackingReferences::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return FullSchemaTrackingReferencesConstraint::constraints();
    }
}
