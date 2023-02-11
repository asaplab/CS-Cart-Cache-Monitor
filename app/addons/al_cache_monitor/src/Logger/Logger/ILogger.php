<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  * ****************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger\Logger;

use Tygh\Addons\AlCacheMonitor\Logger\Log\ALog;

interface ILogger
{
    public function write(ALog $log): void;

    public function show(array $params): array;
}
