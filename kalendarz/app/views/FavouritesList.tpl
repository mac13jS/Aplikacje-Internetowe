<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Seria</th>
            <th>Ulubione</th>
        </tr>
    </thead>
    <tbody>
    {foreach $series as $s}
    {strip}
        <tr>
            <td><a class="series" href="{$conf->action_root}calendar/{$s['id_series']}">{$s["name"]}</a></td>
            <td>
                <a class="button-small pure-button button-secondary" href="{$conf->action_root}seriesFavouriteDelete/{$s['id_series']}">Usuń</a>
            </td>
        </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>