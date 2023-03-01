<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

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
