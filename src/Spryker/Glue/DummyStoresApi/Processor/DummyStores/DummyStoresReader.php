<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Processor\DummyStores;

use ArrayObject;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\GlueResourceTransfer;
use Generated\Shared\Transfer\GlueResponseTransfer;
use Generated\Shared\Transfer\StoreCountryRestAttributesTransfer;
use Generated\Shared\Transfer\StoreCurrencyRestAttributesTransfer;
use Generated\Shared\Transfer\StoreRegionRestAttributesTransfer;
use Generated\Shared\Transfer\StoresRestAttributesTransfer;
use Spryker\Glue\DummyStoresApi\DummyStoresApiConfig;

class DummyStoresReader implements DummyStoresReaderInterface
{
    /**
     * @var string
     */
    protected const STORE_NAME_DE = 'DE';

    /**
     * @var string
     */
    protected const STORE_NAME_AT = 'AT';

    /**
     * @var string
     */
    protected const STORE_NAME_US = 'US';

    /**
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     * @param \Generated\Shared\Transfer\GlueResponseTransfer $glueResponseTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function getStoresAttributes(GlueRequestTransfer $glueRequestTransfer, GlueResponseTransfer $glueResponseTransfer): GlueResponseTransfer
    {
        $storesRestAttributes = $this->createFakeStoresRestAttributeTransfer();

        $storesName = [static::STORE_NAME_DE, static::STORE_NAME_US];

        foreach ($storesName as $storeName) {
            $resourceTransfer = new GlueResourceTransfer();
            $resourceTransfer->setAttributes($storesRestAttributes);
            $resourceTransfer->setId($storeName);
            $resourceTransfer->setType(DummyStoresApiConfig::RESOURCE_STORES);

            $glueResponseTransfer->addResource($resourceTransfer);
        }

        return $glueResponseTransfer->setAttributes((new StoresRestAttributesTransfer())
            ->setTimeZone('test rest api convention')
            ->setDefaultCurrency('test get request'));
    }

    /**
     * @return \Generated\Shared\Transfer\StoresRestAttributesTransfer
     */
    protected function createFakeStoresRestAttributeTransfer(): StoresRestAttributesTransfer
    {
        $storesRestAttributeTransfer = (new StoresRestAttributesTransfer())
            ->setTimezone('Europe/Berlin')
            ->setDefaultCurrency('EUR')
            ->setCurrencies(new ArrayObject($this->createFakeCurrencies()))
            ->setCountries(new ArrayObject($this->createFakeCountries()));

        return $storesRestAttributeTransfer;
    }

    /**
     * @return array<\Generated\Shared\Transfer\StoreCurrencyRestAttributesTransfer>
     */
    protected function createFakeCurrencies(): array
    {
        return [
            (new StoreCurrencyRestAttributesTransfer())->setCode('EUR')->setName('Euro'),
            (new StoreCurrencyRestAttributesTransfer())->setCode('CHF')->setName('Swiss Franc'),
        ];
    }

    /**
     * @return array<\Generated\Shared\Transfer\StoreCountryRestAttributesTransfer>
     */
    protected function createFakeCountries(): array
    {
        return [
            (new StoreCountryRestAttributesTransfer())->setIso2Code('DE')->setName('Foo')->setRegions(new ArrayObject($this->createFakeRegions()))->setPostalCodeMandatory(false),
            (new StoreCountryRestAttributesTransfer())->setIso2Code('US')->setName('Bar')->setRegions(new ArrayObject($this->createFakeRegions()))->setPostalCodeMandatory(false),
        ];
    }

    /**
     * @return \Generated\Shared\Transfer\StoreRegionRestAttributesTransfer
     */
    protected function createFakeRegions(): StoreRegionRestAttributesTransfer
    {
        return (new StoreRegionRestAttributesTransfer())->setIso2Code('US-AL')->setName('Alabama');
    }
}
