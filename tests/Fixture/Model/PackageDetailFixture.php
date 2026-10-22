<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PackageDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PackageDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class PackageDetailFixture
{
    public static function build(): PackageDetail
    {
        return PackageDetail::builder()
            ->setPhysicalPackagingType('BARREL')
            ->setSequenceNumber('45')
            ->setUndeliveredCount('7')
            ->setCount('1')
            ->setPackageContent(['wire hangers', 'buttons'])
            ->setContentPieceCount('100')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): PackageDetail */
    public static function reader(): callable
    {
        return PackageDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PackageDetailConstraint::constraints();
    }
}
