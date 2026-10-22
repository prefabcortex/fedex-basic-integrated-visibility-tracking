<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackagingDescription;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PackagingDescriptionConstraint;
use Symfony\Component\Validator\Constraint;

final class PackagingDescriptionFixture
{
    public static function build(): PackagingDescription
    {
        return PackagingDescription::builder()
            ->setDescription('FedEx Pak')
            ->setType('FEDEX_PAK')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): PackagingDescription */
    public static function reader(): callable
    {
        return PackagingDescription::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PackagingDescriptionConstraint::constraints();
    }
}
