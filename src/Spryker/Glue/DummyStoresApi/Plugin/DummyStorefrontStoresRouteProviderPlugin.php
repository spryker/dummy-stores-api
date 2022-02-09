<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Spryker\Glue\GlueStorefrontApiApplication\Plugin\GlueStorefrontApiApplication\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Glue\GlueStorefrontApiApplication\Router\Route\RouteCollection as StorefrontRouteCollection;
use Spryker\Glue\GlueStorefrontApiApplicationExtension\Dependency\Plugin\RouteProviderPluginInterface as StorefrontRouteProviderPluginInterface;
use Spryker\Glue\StoresRestApi\StoresRestApiConfig;
use Symfony\Component\HttpFoundation\Request;

class DummyStorefrontStoresRouteProviderPlugin extends AbstractRouteProviderPlugin implements StorefrontRouteProviderPluginInterface
{
    /**
     * @param \Spryker\Glue\GlueStorefrontApiApplication\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Glue\GlueStorefrontApiApplication\Router\Route\RouteCollection
     */
    public function addRoutes(StorefrontRouteCollection $routeCollection): StorefrontRouteCollection
    {
        $postRoute = $this->createPostRoute('/custom-stores', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('storesPost', $postRoute);

        $postRoute = $this->createPostRoute('/custom-stores', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('storesPost2', $postRoute);

        $patchRoute = $this->createPatchRoute('/custom-stores/{id}', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('storesPost', $patchRoute);

        $collectionRoute = $this->createGetCollectionRoute('/custom-stores', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('storesCollection', $collectionRoute);

        $route = $this->createGetRoute('/custom-stores/{id}', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('stores', $route);

        $route = $this->createGetRoute('/custom-stores/{stroreId}/countries/{countryId}', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('storesCountries', $route);

        $routeToController = $this->createRouteToController(
            '/countries',
            $this->getModuleName(),
            'stores-resource',
            'getCollectionAction',
            Request::METHOD_GET,
        );
        $routeCollection->add('countriesController', $routeToController);

        return $routeCollection;
    }
}
