<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Generated\Shared\Transfer\GlueRelationshipTransfer;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\GlueResourceTransfer;
use Generated\Shared\Transfer\StoreCountryRestAttributesTransfer;
use Spryker\Glue\GlueJsonApiConventionExtension\Dependency\Plugin\ResourceRelationshipPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class DummyCountriesResourceRelationshipPlugin extends AbstractPlugin implements ResourceRelationshipPluginInterface
{
    /**
     * @var string
     */
    protected const RESOURCE_TYPE_COUNTRIES = 'countries';

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
            /** @var \Generated\Shared\Transfer\StoresRestAttributesTransfer $storesRestAttributesTransfer */
            $storesRestAttributesTransfer = $glueResourceTransfer->getAttributes();
            $glueRelationshipTransfer = new GlueRelationshipTransfer();

            foreach ($storesRestAttributesTransfer->getCountries() as $country) {
                $glueRelationshipTransfer->addResource((new GlueResourceTransfer())
                        ->setType(static::RESOURCE_TYPE_COUNTRIES)
                        ->setId($country->getIso2Code())
                        ->setAttributes((new StoreCountryRestAttributesTransfer())->fromArray($country->toArray())));
            }
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
        return static::RESOURCE_TYPE_COUNTRIES;
    }
}
