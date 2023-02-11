<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Enum;

class CacheTypes
{
    const CACHE    = 'C';
    const REGISTRY = 'R';

    public static function getAllWithName(): array
    {
        return [
            self::CACHE    => __('al_cache_monitor.cache_types.cache'),
            self::REGISTRY => __('al_cache_monitor.cache_types.registry')
        ];
    }

    public static function getTypeName(string $type): string
    {
        $types = self::getAllWithName();

        return $types[$type] ?? '';
    }

    public static function getAll(): array
    {
        return array_keys(self::getAllWithName());
    }
}
