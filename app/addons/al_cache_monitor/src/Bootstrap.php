<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor;

use Tygh\Core\ApplicationInterface;
use Tygh\Core\BootstrapInterface;
use Tygh\Core\HookHandlerProviderInterface;

/**
 * This class describes instructions for loading the al_cache_monitor add-on
 *
 * @package Tygh\Addons\AlCacheMonitor
 */
class Bootstrap implements BootstrapInterface, HookHandlerProviderInterface
{
    /** @inheridoc */
    public function boot(ApplicationInterface $app)
    {
        $app->register(new ServiceProvider());
    }

    /** @inheridoc */
    public function getHookHandlerMap()
    {
        return [
            'clear_cache_post' => ['addons.al_cache_monitor.hook_handlers.cache', 'onAfterClearCache'],

            'registry_save_pre' => ['addons.al_cache_monitor.hook_handlers.registry', 'onBeforeSaveRegistry'],

            'login_user_post' => ['addons.al_cache_monitor.hook_handlers.users', 'onAfterLoginUser'],
        ];
    }
}
