<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger\Logger;

use Tygh\Addons\AlCacheMonitor\Logger\Log\ALog;
use Tygh\Addons\AlCacheMonitor\Enum\CacheTypes;
use Tygh\Registry;
use Tygh\Navigation\LastView;

class DatabaseLogger implements ILogger
{
    public function write(ALog $log): void
    {
        if ($log->isContentExists() && db_has_table('cache_monitor_logs')) {
            db_replace_into('cache_monitor_logs', $log->toArrayWithSerialize());
        }
    }

    public function show(array $params): array
    {
        $params = LastView::instance()->update('cache_monitor_logs', $params);

        $params = array_merge([
            'page'           => 1,
            'items_per_page' => Registry::get('settings.Appearance.admin_elements_per_page')
        ], $params);

        $sortings = [
            'timestamp' => ['?:cache_monitor_logs.timestamp', '?:cache_monitor_logs.log_id'],
        ];

        $sorting = db_sort($params, $sortings, 'timestamp', 'desc');

        $condition = $limit = '';

        if (!empty($params['limit'])) {
            $limit = db_quote(' LIMIT 0, ?i', $params['limit']);
        }

        if (!empty($params['period']) && $params['period'] != 'A') {
            [$time_from, $time_to] = fn_create_periods($params);
            $condition .= db_quote(' AND (?:cache_monitor_logs.timestamp >= ?i AND ?:cache_monitor_logs.timestamp <= ?i)', $time_from, $time_to);
        }

        if (!empty($params['items_per_page'])) {
            $params['total_items'] = db_get_field('SELECT COUNT(DISTINCT(?:cache_monitor_logs.log_id)) FROM ?:cache_monitor_logs WHERE 1 ?p', $condition);
            $limit = db_paginate($params['page'], $params['items_per_page'], $params['total_items']);
        }

        $logs = db_get_array('SELECT * FROM ?:cache_monitor_logs WHERE 1 ?p ?p ?p', $condition, $sorting, $limit);

        $logs = $this->gatherAdditionalLogsData($logs, $params);

        return [$logs, $params];
    }

    private function gatherAdditionalLogsData(array $logs, array $params): array
    {
        $logs = array_map(function ($log_row) {
            $log_row['content'] = !empty($log_row['content']) ? unserialize($log_row['content']) : [];
            $log_row['request'] = !empty($log_row['request']) ? unserialize($log_row['request']) : [];
            $log_row['type_name'] = CacheTypes::getTypeName($log_row['type']);

            return $log_row;
        }, $logs);

        return $logs;
    }
}
