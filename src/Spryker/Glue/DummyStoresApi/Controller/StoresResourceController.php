<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Controller;

use ArrayObject;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\GlueResourceTransfer;
use Generated\Shared\Transfer\GlueResponseTransfer;
use Generated\Shared\Transfer\StoreCountryRestAttributesTransfer;
use Generated\Shared\Transfer\StoresRestAttributesTransfer;
use Spryker\Glue\Kernel\Controller\AbstractStorefrontApiController;

/**
 * @method \Spryker\Glue\DummyStoresApi\DummyStoresApiFactory getFactory()
 */
class StoresResourceController extends AbstractStorefrontApiController
{
    /**
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function getCollectionAction(GlueRequestTransfer $glueRequestTransfer): GlueResponseTransfer
    {
        return $this->getFactory()->createDummyStoresReader()
            ->getStoresAttributes($glueRequestTransfer, (new GlueResponseTransfer()));
    }

    /**
     * @param \Generated\Shared\Transfer\StoresRestAttributesTransfer $storesRestAttributesTransfer
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function postAction(
        StoresRestAttributesTransfer $storesRestAttributesTransfer,
        GlueRequestTransfer $glueRequestTransfer
    ): GlueResponseTransfer {
            return (new GlueResponseTransfer())
                ->addResource((new GlueResourceTransfer())
                    ->setId('DE')
                    ->setType('stores test post')
                    ->setAttributes((new StoresRestAttributesTransfer())
                        ->setTimeZone('test rest api convention')
                        ->setDefaultCurrency('test post request')
                        ->setCountries(new ArrayObject([(new StoreCountryRestAttributesTransfer())->setName('test')->setIso2Code('iso code')]))));
        }

    /**
     * @param \Generated\Shared\Transfer\StoresRestAttributesTransfer $storesRestAttributesTransfer
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     *
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function patchAction(
        StoresRestAttributesTransfer $storesRestAttributesTransfer,
        GlueRequestTransfer $glueRequestTransfer
    ): GlueResponseTransfer {
        return (new GlueResponseTransfer())
            ->addResource((new GlueResourceTransfer())->setId('DE')->setType('stores test patch')
                ->setAttributes((new StoresRestAttributesTransfer())
                    ->setTimeZone('test rest api convention')
                    ->setDefaultCurrency('test patch request')));
    }
}
