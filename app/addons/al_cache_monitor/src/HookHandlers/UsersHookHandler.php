<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * Infrastructure https://asaplab.io/ and hosting https://scalesta.com/     *
 * solutions built for eCommerce businesses with 24/7/365 monitoring with   *
 * excellent tech support.                                                  * ****************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\HookHandlers;

use Tygh\Enum\YesNo;
use Tygh\Enum\NotificationSeverity;
use Tygh\Development;

class UsersHookHandler
{
    /**
     * The "login_user_post" hook handler.
     *
     * Actions performed:
     *  - Shows disable compile check setting
     *
     * @see fn_login_user
     */
    public function onAfterLoginUser($user_id, $cu_id, $udata, $auth, $condition, $result)
    {
        if (
            $result === LOGIN_STATUS_OK
            && ACCOUNT_TYPE === 'admin'
            && !empty($udata['is_root'])
            && $udata['is_root'] === YesNo::YES
            && Development::isEnabled('compile_check')
        ) {
            fn_set_notification(NotificationSeverity::ERROR, __('warning'), __('al_cache_monitor.compile_check', [
                '[link]' => fn_url('themes.manage')
            ]), 'S');
        }
    }
}
