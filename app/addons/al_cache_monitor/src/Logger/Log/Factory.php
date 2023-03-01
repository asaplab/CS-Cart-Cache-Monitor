<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger\Log;

use Tygh\Exceptions\ClassNotFoundException;

class Factory
{
    public function create(string $type): ALog
    {
        $log_factory = fn_get_schema('al_cache_monitor', 'log_factory');

        if (isset($log_factory[$type]['class']) && class_exists($log_factory[$type]['class'])) {
            $log = new $log_factory[$type]['class']($type);
        } else {
            throw new ClassNotFoundException("Undefined class for log type: {$type}");
        }

        return $log;
    }
}
