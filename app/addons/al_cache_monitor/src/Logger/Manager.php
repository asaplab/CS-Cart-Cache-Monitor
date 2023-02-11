<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger;

use Tygh\Addons\AlCacheMonitor\Logger\Logger\ILogger;
use Tygh\Addons\AlCacheMonitor\Logger\Log\ALog;
use Tygh\Addons\AlCacheMonitor\Logger\Log\Factory;

class Manager
{
    protected $cache_monitor;

    public function __construct(ILogger $cache_monitor)
    {
        $this->cache_monitor = $cache_monitor;
    }

    public function writeLog(ALog $log): void
    {
        $this->cache_monitor->write($log);
    }

    public function showLogs(array $params): array
    {
        return $this->cache_monitor->show($params);
    }

    public function createLog(string $type, array $params): ALog
    {
        $log = (new Factory())->create($type);
        $log->setContent($params);

        return $log;
    }
}
