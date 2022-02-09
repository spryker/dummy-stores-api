<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Generated\Shared\Transfer\GlueRelationshipTransfer;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\GlueResourceTransfer;
use Generated\Shared\Transfer\StoreRegionRestAttributesTransfer;
use Spryker\Glue\GlueJsonApiConventionExtension\Dependency\Plugin\ResourceRelationshipPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class DummyRegionsResourceRelationshipPlugin extends AbstractPlugin implements ResourceRelationshipPluginInterface
{
    /**
     * @var string
     */
    protected const RESOURCE_TYPE_REGIONS = 'regions';

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
            if ($glueResourceTransfer->getId() === 'DE') {
                $relationshipValue = (new GlueResourceTransfer())
                    ->setType(static::RESOURCE_TYPE_REGIONS)
                    ->setId('DE-BE')
                    ->setAttributes(
                        (new StoreRegionRestAttributesTransfer())
                            ->setIso2Code('DE-BE')
                            ->setName('Berlin'),
                    );

                $glueResourceTransfer->addRelationship((new GlueRelationshipTransfer())->addResource($relationshipValue));
            }

            if ($glueResourceTransfer->getId() === 'US') {
                $relationshipValue = (new GlueResourceTransfer())
                    ->setType(static::RESOURCE_TYPE_REGIONS)
                    ->setId('US-AL')
                    ->setAttributes(
                        (new StoreRegionRestAttributesTransfer())
                            ->setIso2Code('US-AL')
                            ->setName('Alabama'),
                    );

                $glueResourceTransfer->addRelationship((new GlueRelationshipTransfer())->addResource($relationshipValue));
            }
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
        return static::RESOURCE_TYPE_REGIONS;
    }
}
