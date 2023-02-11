<div class="sidebar-row">
    <h6>{__("search")}</h6>
    <form action="{""|fn_url}" name="cache_monitor_logs_form" method="get">
        {capture name="simple_search"}
            {include file="common/period_selector.tpl" period=$search.period extra="" display="form" button="false"}
        {/capture}

        {include file="common/advanced_search.tpl" simple_search=$smarty.capture.simple_search dispatch="cache_monitor_logs.manage" view_type="cache_monitor_logs"}
    </form>
</div>
