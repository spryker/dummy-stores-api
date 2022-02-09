<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Spryker\Glue\GlueBackendApiApplication\Plugin\GlueBackendApiApplication\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection as BackendRouteCollection;
use Spryker\Glue\GlueBackendApiApplicationExtension\Dependency\Plugin\RouteProviderPluginInterface as BackendRouteProviderPluginInterface;
use Spryker\Glue\StoresRestApi\StoresRestApiConfig;
use Symfony\Component\HttpFoundation\Request;

class DummyBackendStoresRouteProviderPlugin extends AbstractRouteProviderPlugin implements BackendRouteProviderPluginInterface
{
    /**
     * @param \Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection
     */
    public function addRoutes(BackendRouteCollection $routeCollection): BackendRouteCollection
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
