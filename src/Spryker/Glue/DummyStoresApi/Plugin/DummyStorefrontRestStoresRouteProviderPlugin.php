<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\DummyStoresApi\Plugin;

use Spryker\Glue\GlueStorefrontApiApplication\Plugin\GlueStorefrontApiApplication\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Glue\GlueStorefrontApiApplication\Router\Route\RouteCollection;
use Spryker\Glue\GlueStorefrontApiApplicationExtension\Dependency\Plugin\RouteProviderPluginInterface;
use Spryker\Glue\StoresRestApi\StoresRestApiConfig;

class DummyStorefrontRestStoresRouteProviderPlugin extends AbstractRouteProviderPlugin implements RouteProviderPluginInterface
{
    /**
     * @param \Spryker\Glue\GlueStorefrontApiApplication\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Glue\GlueStorefrontApiApplication\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->createGetCollectionRoute('/custom-stores', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('customStoresRestCollection', $route);

        $route = $this->createGetRoute('/custom-stores/{id}', StoresRestApiConfig::RESOURCE_STORES);
        $routeCollection->add('customStoresRest', $route);

        return $routeCollection;
    }
}
