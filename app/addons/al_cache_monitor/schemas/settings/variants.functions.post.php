<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

use Tygh\Registry;

function fn_settings_variants_addons_al_cache_monitor_track_changed_tables(): array
{
    [$database_size, $all_tables] = fn_get_stats_tables();

    $table_prefix = Registry::get('config.table_prefix');
    $all_tables = array_map(function ($table) use ($table_prefix) {
        return str_replace($table_prefix, '', $table);
    }, $all_tables);

    return array_combine($all_tables, $all_tables);
}
