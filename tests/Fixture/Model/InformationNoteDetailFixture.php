<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\InformationNoteDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\InformationNoteDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class InformationNoteDetailFixture
{
    public static function build(): InformationNoteDetail
    {
        return InformationNoteDetail::builder()
            ->setCode('CLEARANCE_ENTRY_FEE_APPLIES')
            ->setDescription('this is an informational message')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): InformationNoteDetail */
    public static function reader(): callable
    {
        return InformationNoteDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return InformationNoteDetailConstraint::constraints();
    }
}
