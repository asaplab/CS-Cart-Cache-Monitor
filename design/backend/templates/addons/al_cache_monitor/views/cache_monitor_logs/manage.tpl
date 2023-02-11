{capture name="mainbox"}
    {include file="common/pagination.tpl"}

    {if $logs}
        <div class="table-responsive-wrapper">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>{__("type")}</th>
                    <th>{__("content")}</th>
                    <th>{__("request")}</th>
                    <th>{__("time")}</th>
                </tr>
                </thead>
                <tbody>
                {foreach $logs as $log}
                    <tr>
                        <td width="10%" data-th="{__("type")}">
                            {$log.type_name}
                        </td>
                        <td width="40%" class="wrap" data-th="{__("content")}">
                            {if $log.type === "\Tygh\Addons\AlCacheMonitor\Enum\CacheTypes::CACHE"|constant}
                                {include file="addons/al_cache_monitor/views/cache_monitor_logs/components/cache_content.tpl" content=$log.content}
                            {elseif $log.type === "\Tygh\Addons\AlCacheMonitor\Enum\CacheTypes::REGISTRY"|constant}
                                {include file="addons/al_cache_monitor/views/cache_monitor_logs/components/registry_content.tpl" content=$log.content}
                            {/if}
                        </td>
                        <td width="40%" class="wrap" data-th="{__("request")}">
                            {foreach $log.request as $request_key => $request_value}
                                <strong>{$request_key}:</strong> <span><bdi>{$request_value}</bdi></span><br />
                            {/foreach}
                        </td>
                        <td width="10%" data-th="{__("time")}">
                            <span class="nowrap">{$log.timestamp|date_format:"`$settings.Appearance.date_format`, `$settings.Appearance.time_format`"}</span>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    {else}
        <p class="no-items">{__("no_data")}</p>
    {/if}

    {include file="common/pagination.tpl"}

    {capture name="sidebar"}
        {include file="common/saved_search.tpl" dispatch="cache_monitor_logs.manage" view_type="cache_monitor_logs"}
        {include file="addons/al_cache_monitor/views/cache_monitor_logs/components/cache_monitor_logs_search_form.tpl"}
    {/capture}
{/capture}

{include file="common/mainbox.tpl" title=__("al_cache_monitor.cache_monitor_logs") content=$smarty.capture.mainbox sidebar=$smarty.capture.sidebar}
