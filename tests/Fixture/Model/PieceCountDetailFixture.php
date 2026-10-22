<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PieceCountDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\PieceCountDetailType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\PieceCountDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class PieceCountDetailFixture
{
    public static function build(): PieceCountDetail
    {
        return PieceCountDetail::builder()
            ->setCount('35')
            ->setDescription('picec count description')
            ->setType(PieceCountDetailType::ORIGIN)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): PieceCountDetail */
    public static function reader(): callable
    {
        return PieceCountDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PieceCountDetailConstraint::constraints();
    }
}
