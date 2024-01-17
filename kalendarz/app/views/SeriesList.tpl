<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Seria</th>
            <th>Ulubione</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
    {foreach $series as $s}
    {strip}
        <tr>
            <td><a class="series" href="{$conf->action_root}calendar/{$s['id_series']}">{$s["name"]}</a></td>
            <td>
                <a class="button-small pure-button button-secondary" href="{$conf->action_root}seriesFavouriteAdd/{$s['id_series']}">Dodaj</a>
            </td>
            <td>
                <a class="button-small pure-button button-secondary" href="{$conf->action_root}seriesEdit/{$s['id_series']}">Edytuj</a>
                &nbsp;
                <a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć serię z listy?', '{$conf->action_root}seriesDelete/{$s['id_series']}')">Usuń</a>
            </td>
        </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>