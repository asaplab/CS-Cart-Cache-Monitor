<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

use Tygh\Addons\AlCacheMonitor\Enum\CacheTypes;

$schema = [
    CacheTypes::CACHE    => [
        'class' => '\Tygh\Addons\AlCacheMonitor\Logger\Log\CacheLog'
    ],
    CacheTypes::REGISTRY => [
        'class' => '\Tygh\Addons\AlCacheMonitor\Logger\Log\RegistryLog'
    ]
];

return $schema;
