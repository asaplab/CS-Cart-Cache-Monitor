<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Tygh\Addons\AlCacheMonitor\Logger\Manager;
use Tygh\Addons\AlCacheMonitor\Logger\Logger\DatabaseLogger;
use Tygh\Addons\AlCacheMonitor\HookHandlers\CacheHookHandler;
use Tygh\Addons\AlCacheMonitor\HookHandlers\RegistryHookHandler;
use Tygh\Addons\AlCacheMonitor\HookHandlers\UsersHookHandler;
use Tygh\Tygh;

/**
 * Class ServiceProvider is intended to register services and components of the "Cache monitor" add-on to the application container.
 *
 * @package Tygh\Addons\AlCacheMonitor
 */
class ServiceProvider implements ServiceProviderInterface
{
    /** @inheritDoc */
    public function register(Container $app)
    {
        $app['addons.al_cache_monitor.logger.manager'] = function () {
            return new Manager(
                new DatabaseLogger()
            );
        };

        $app['addons.al_cache_monitor.hook_handlers.cache'] = function () {
            return new CacheHookHandler();
        };

        $app['addons.al_cache_monitor.hook_handlers.registry'] = function () {
            return new RegistryHookHandler();
        };

        $app['addons.al_cache_monitor.hook_handlers.users'] = function () {
            return new UsersHookHandler();
        };
    }

    /**
     * @return \Tygh\Addons\AlCacheMonitor\Logger\Manager
     */
    public static function getLoggerManager()
    {
        return Tygh::$app['addons.al_cache_monitor.logger.manager'];
    }
}
