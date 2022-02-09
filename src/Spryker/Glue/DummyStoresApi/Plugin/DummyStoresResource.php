<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Generated\Shared\Transfer\GlueResourceMethodCollectionTransfer;
use Generated\Shared\Transfer\GlueResourceMethodConfigurationTransfer;
use Spryker\Glue\DummyStoresApi\Controller\StoresResourceController;
use Spryker\Glue\DummyStoresApi\DummyStoresApiConfig;
use Spryker\Glue\GlueApplication\Plugin\GlueApplication\AbstractResourcePlugin;
use Spryker\Glue\GlueJsonApiConventionExtension\Dependency\Plugin\JsonApiResourceInterface;

class DummyStoresResource extends AbstractResourcePlugin implements JsonApiResourceInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return DummyStoresApiConfig::RESOURCE_STORES;
    }

    /**
     * @uses \Spryker\Glue\DummyStoresApi\Controller\StoresResourceController
     *
     * @return string
     */
    public function getController(): string
    {
        return StoresResourceController::class;
    }

    /**
     * @return \Generated\Shared\Transfer\GlueResourceMethodCollectionTransfer
     */
    public function getDeclaredMethods(): GlueResourceMethodCollectionTransfer
    {
        return (new GlueResourceMethodCollectionTransfer())
            ->setGetCollection(new GlueResourceMethodConfigurationTransfer())
            ->setPost(
                (new GlueResourceMethodConfigurationTransfer())
                    ->setAction('postAction'),
            )
            ->setPatch(
                (new GlueResourceMethodConfigurationTransfer())
                    ->setAction('patchAction'),
            );
    }
}
