<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\HookHandlers;

use Tygh\Addons\AlCacheMonitor\ServiceProvider;
use Tygh\Addons\AlCacheMonitor\Enum\CacheTypes;

class CacheHookHandler
{
    /**
     * The "clear_cache_post" hook handler.
     *
     * Actions performed:
     *  - Writes cache monitor log.
     *
     * @see fn_clear_cache
     */
    public function onAfterClearCache($type, $extra)
    {
        $cache_monitor_manager = ServiceProvider::getLoggerManager();
        $cache_monitor_manager->writeLog(
            $cache_monitor_manager->createLog(CacheTypes::CACHE, [
                'type'  => $type,
                'extra' => $extra
            ])
        );
    }
}
