<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

use Tygh\Addons\AlCacheMonitor\ServiceProvider;

defined('BOOTSTRAP') or die('Access denied');

/** @var string $mode */

$params = $_REQUEST;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    return [CONTROLLER_STATUS_OK];
}

if ($mode === 'manage') {
    [$logs, $search] = ServiceProvider::getLoggerManager()->showLogs($params);

    Tygh::$app['view']->assign([
        'logs'   => $logs,
        'search' => $search
    ]);
}
