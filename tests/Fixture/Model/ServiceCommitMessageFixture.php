<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceCommitMessage;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ServiceCommitMessageType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ServiceCommitMessageConstraint;
use Symfony\Component\Validator\Constraint;

final class ServiceCommitMessageFixture
{
    public static function build(): ServiceCommitMessage
    {
        return ServiceCommitMessage::builder()
            ->setMessage('No scheduled delivery date available at this time.')
            ->setType(ServiceCommitMessageType::ESTIMATED_DELIVERY_DATE_UNAVAILABLE)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ServiceCommitMessage */
    public static function reader(): callable
    {
        return ServiceCommitMessage::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ServiceCommitMessageConstraint::constraints();
    }
}
