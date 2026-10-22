<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactAndAddressConstraint;
use Symfony\Component\Validator\Constraint;

final class ContactAndAddressFixture
{
    public static function build(): ContactAndAddress
    {
        $contact = ContactVO::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO::builder(
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
            ->setCountryName('United States')
            ->build();

        return ContactAndAddress::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();
    }

    /** @return callable(array<int|string, mixed>): ContactAndAddress */
    public static function reader(): callable
    {
        return ContactAndAddress::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ContactAndAddressConstraint::constraints();
    }
}
