<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi;

use Spryker\Glue\DummyStoresApi\Processor\DummyStores\DummyStoresReader;
use Spryker\Glue\DummyStoresApi\Processor\DummyStores\DummyStoresReaderInterface;
use Spryker\Glue\Kernel\AbstractStorefrontApiFactory;

class DummyStoresApiFactory extends AbstractStorefrontApiFactory
{
    /**
     * @return \Spryker\Glue\DummyStoresApi\Processor\DummyStores\DummyStoresReaderInterface
     */
    public function createDummyStoresReader(): DummyStoresReaderInterface
    {
        return new DummyStoresReader();
    }
}
