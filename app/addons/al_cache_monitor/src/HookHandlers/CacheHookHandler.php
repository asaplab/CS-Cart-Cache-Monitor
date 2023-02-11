<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

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
