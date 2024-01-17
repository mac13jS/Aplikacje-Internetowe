<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Runda</th>
            <th>Nazwa</th>
            <th>Tor</th>
            <th>Data</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
    {foreach $calendar as $c}
    {strip}
        <tr>
            <td>{$c["round"]}</td>
		    <td>{$c["name"]}</td>
		    <td>{$c["circuit"]}</td>
	        <td>{$c["date"]}</td>
            <td>
                <a class="button-small pure-button button-secondary" href="{$conf->action_root}calendarEdit/{$c['id_calendar']}">Edytuj</a>
                &nbsp;
                <a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć rundę z listy?', '{$conf->action_root}calendarDelete/{$c['id_calendar']}')">Usuń</a>
            </td>
        </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>