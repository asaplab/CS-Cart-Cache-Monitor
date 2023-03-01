<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

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
