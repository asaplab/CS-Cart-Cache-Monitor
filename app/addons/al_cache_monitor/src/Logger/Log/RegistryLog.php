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

use Tygh\Registry;

class RegistryLog extends ALog
{
    public function buildContent(array $content): array
    {
        return $this->filterContent($content);
    }

    protected function filterContent(array $content): array
    {
        $changed_tables = !empty($content['changed_tables']) ? array_keys($content['changed_tables']) : [];
        $changed_tables = $this->filterChangedTables($changed_tables);

        if (!$changed_tables) {
            return [];
        }

        $condition = db_quote(' AND table_name IN (?a)', $changed_tables);
        $cache_list = db_get_hash_multi_array(
            'SELECT table_name, cache_key'
            . ' FROM ?:cache_handlers'
            . ' WHERE 1 ?p',
            ['table_name', 'cache_key', 'cache_key'],
            $condition
        );

        if (!$cache_list) {
            return [];
        }

        return [
            'changed_tables' => $changed_tables,
            'cache_list'     => $cache_list
        ];
    }

    private function filterChangedTables(array $changed_tables): array
    {
        if (!$changed_tables) {
            return [];
        }

        $track_changed_tables = Registry::get('addons.al_cache_monitor.track_changed_tables');

        return array_filter($changed_tables, function ($table) use ($track_changed_tables) {
            return isset($track_changed_tables[$table]);
        });
    }
}
