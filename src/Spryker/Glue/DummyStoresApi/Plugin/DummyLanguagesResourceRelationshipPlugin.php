<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Generated\Shared\Transfer\GlueRelationshipTransfer;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\GlueResourceTransfer;
use Generated\Shared\Transfer\StoreLocaleRestAttributesTransfer;
use Spryker\Glue\GlueJsonApiConventionExtension\Dependency\Plugin\ResourceRelationshipPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class DummyLanguagesResourceRelationshipPlugin extends AbstractPlugin implements ResourceRelationshipPluginInterface
{
    /**
     * @var string
     */
    protected const RESOURCE_TYPE_LANGUAGES = 'languages';

    /**
     * @api
     *
     * @param array<\Generated\Shared\Transfer\GlueResourceTransfer> $resources
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     *
     * @return void
     */
    public function addRelationships(array $resources, GlueRequestTransfer $glueRequestTransfer): void
    {
        foreach ($resources as $glueResourceTransfer) {
            $glueRelationshipTransfer = new GlueRelationshipTransfer();
            $glueRelationshipTransfer->addResource(
                (new GlueResourceTransfer())
                    ->setType(static::RESOURCE_TYPE_LANGUAGES)
                    ->setId('DE')
                    ->setAttributes((new StoreLocaleRestAttributesTransfer())->setName('German')),
            );
            $glueRelationshipTransfer->addResource(
                (new GlueResourceTransfer())
                    ->setType(static::RESOURCE_TYPE_LANGUAGES)
                    ->setId('EN')
                    ->setAttributes((new StoreLocaleRestAttributesTransfer())->setName('English')),
            );
            $glueResourceTransfer->addRelationship($glueRelationshipTransfer);
        }
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getRelationshipResourceType(): string
    {
        return static::RESOURCE_TYPE_LANGUAGES;
    }
}
