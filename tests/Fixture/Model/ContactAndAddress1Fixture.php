<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactAndAddress1Constraint;
use Symfony\Component\Validator\Constraint;

final class ContactAndAddress1Fixture
{
    public static function build(): ContactAndAddress1
    {
        $contact = ContactVO1::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO1::builder(
            // streetLines
            ['1043 North Easy Street', 'Suite 999'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->build();

        return ContactAndAddress1::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();
    }

    /** @return callable(array<int|string, mixed>): ContactAndAddress1 */
    public static function reader(): callable
    {
        return ContactAndAddress1::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ContactAndAddress1Constraint::constraints();
    }
}
