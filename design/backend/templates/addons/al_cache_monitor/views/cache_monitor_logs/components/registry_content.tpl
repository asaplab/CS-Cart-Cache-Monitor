{if $content.changed_tables}
    <strong>{__("al_cache_monitor.changed_tables")}:</strong> <span><bdi>{implode(", ", $content.changed_tables)}</bdi></span><br />
{/if}

{if $content.cache_list}
    {foreach $content.cache_list as $table => $cache_list}
        ¦&nbsp;&nbsp;<strong>{__("al_cache_monitor.table")}:</strong> <span><bdi>{$table}</bdi></span><br />
        ¦&nbsp;&nbsp;¦&nbsp;&nbsp;<strong>{__("al_cache_monitor.cache_list")}:</strong> <span><bdi>{implode(", ", $cache_list)}</bdi></span><br />
    {/foreach}
{/if}
