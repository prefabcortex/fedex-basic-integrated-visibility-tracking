<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageIdentifier;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageIdentifierType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PackageIdentifierConstraint;
use Symfony\Component\Validator\Constraint;

final class PackageIdentifierFixture
{
    public static function build(): PackageIdentifier
    {
        return PackageIdentifier::builder()
            ->setType(PackageIdentifierType::SHIPPER_REFERENCE)
            ->setValue(['REPLACE_ME'])
            ->setTrackingNumberUniqueId('245822~123456789012~FDEG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): PackageIdentifier */
    public static function reader(): callable
    {
        return PackageIdentifier::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PackageIdentifierConstraint::constraints();
    }
}
