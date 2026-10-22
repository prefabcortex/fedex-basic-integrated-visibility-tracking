<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AvailableImagesDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AvailableImagesDetailSize;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AvailableImagesDetailType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AvailableImagesDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class AvailableImagesDetailFixture
{
    public static function build(): AvailableImagesDetail
    {
        return AvailableImagesDetail::builder()
            ->setSize(AvailableImagesDetailSize::LARGE)
            ->setType(AvailableImagesDetailType::BILL_OF_LADING)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): AvailableImagesDetail */
    public static function reader(): callable
    {
        return AvailableImagesDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AvailableImagesDetailConstraint::constraints();
    }
}
