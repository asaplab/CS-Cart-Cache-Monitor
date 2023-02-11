<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger\Log;

class CacheLog extends ALog
{
    public function buildContent(array $content): array
    {
        return [
            'type'  => $content['type']  ?? '',
            'extra' => $content['extra'] ?? ''
        ];
    }
}
