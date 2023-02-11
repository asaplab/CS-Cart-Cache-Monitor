<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  * ****************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\HookHandlers;

use Tygh\Addons\AlCacheMonitor\ServiceProvider;
use Tygh\Addons\AlCacheMonitor\Enum\CacheTypes;

class RegistryHookHandler
{
    /**
     * The "registry_save_pre" hook handler.
     *
     * Actions performed:
     *  - Writes cache monitor log.
     *
     * @see \Tygh\Registry::save
     */
    public function onBeforeSaveRegistry($changed_tables, $cached_keys)
    {
        $cache_monitor_manager = ServiceProvider::getLoggerManager();
        $cache_monitor_manager->writeLog(
            $cache_monitor_manager->createLog(CacheTypes::REGISTRY, [
                'changed_tables' => $changed_tables
            ])
        );
    }
}
