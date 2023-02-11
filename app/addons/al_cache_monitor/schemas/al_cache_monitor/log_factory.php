<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

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
