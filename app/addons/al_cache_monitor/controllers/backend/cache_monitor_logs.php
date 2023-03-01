<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  *
 * **************************************************************************/

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
