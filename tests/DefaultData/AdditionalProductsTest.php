<?php

namespace Crakter\BringApi\DefaultData;

use PHPUnit\Framework\TestCase;
use Crakter\BringApi\Exception\ProductAppliesToNotAllowedException;

class AdditionalProductsTest extends TestCase
{
    /**
     * @dataProvider additionProviderHasAppliesToAllowed
     */
    public function testHasAppliesToAllowedValue(string $allowed, array $onProducts)
    {
        foreach($onProducts as $product) {
            $this->assertTrue(AdditionalProducts::hasAppliesTo($allowed, $product));
        }
    }

    /**
     * @dataProvider additionProviderHasAppliesToNotAllowed
     */
    public function testHasAppliesToNotAllowedValue(string $notAllowed, array $onProducts)
    {
        $this->expectException(ProductAppliesToNotAllowedException::class);
        foreach($onProducts as $product) {
            AdditionalProducts::hasAppliesTo($notAllowed, $product);
        }
    }

    public function additionProviderHasAppliesToNotAllowed()
    {
        return [
            ['EVARSLING', [
                'A-POST',
                'B-POST',
                'PA_DOREN',
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
                'CARGO_GROUPAGE',
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
                'CARGO',
            ]],
            ['POSTOPPKRAV', [
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
                'CARGO_GROUPAGE',
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
                'CARGO',
            ]],
            ['LORDAGSUTKJORING', [
                'A-POST',
                'B-POST',
                'PA_DOREN',
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
                'CARGO_GROUPAGE',
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
                'CARGO',
            ]],
            ['ENVELOPED', [
                'A-POST',
                'B-POST',
                'PA_DOREN',
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'CARGO_GROUPAGE',
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
                'CARGO',
            ]],
            ['ADVISERING', [
                'A-POST',
                'B-POST',
                'PA_DOREN',
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
                'CARGO',
            ]],
            ['PICKUP_POINT', [
                'A-POST',
                'B-POST',
                'PA_DOREN',
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
                'CARGO_GROUPAGE',
                'CARGO',
            ]],
            ['EVE_DELIVERY', [
                'A-POST',
                'B-POST',
                'PA_DOREN',
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
            ]],
        ];
    }

    public function additionProviderHasAppliesToAllowed()
    {
        return [
            ['EVARSLING', [
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'EKSPRESS09',
            ]],
            ['POSTOPPKRAV', [
                'A-POST',
                'B-POST',
                'BPAKKE_DOR-DOR',
                'SERVICEPAKKE',
                'PA_DOREN',
                'EKSPRESS09',
            ]],
            ['LORDAGSUTKJORING', [
                'EKSPRESS09',
            ]],
            ['ENVELOPE', [
                'EXPRESS_INTERNATIONAL_0900',
                'EXPRESS_INTERNATIONAL_1200',
                'EXPRESS_INTERNATIONAL',
            ]],
            ['ADVISERING', [
                'CARGO_GROUPAGE',
            ]],
            ['PICKUP_POINT', [
                'PICKUP_PARCEL',
                'PICKUP_PARCEL_BULK',
            ]],
            ['EVE_DELIVERY', [
                'CARGO',
                'CARGO_GROUPAGE',
            ]],
        ];
    }
}
