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
