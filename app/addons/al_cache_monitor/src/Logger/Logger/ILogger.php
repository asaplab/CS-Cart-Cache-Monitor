<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger\Logger;

use Tygh\Addons\AlCacheMonitor\Logger\Log\ALog;

interface ILogger
{
    public function write(ALog $log): void;

    public function show(array $params): array;
}
