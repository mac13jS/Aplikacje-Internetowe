{extends file="main.tpl"}  

{block name=top}
    <table class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th>Użytkownik</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
        {foreach $users as $u}
        {strip}
            <tr>
                <td>{$u["login"]}</td>
                <td>
                    <a class="button-small pure-button button-secondary" href="{$conf->action_root}manageEdit/{$u['id_user']}">Edytuj</a>
                    &nbsp;
                    <a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć użytkownika?', '{$conf->action_root}manageDeleteUser/{$u['id_user']}')">Usuń</a>
                </td>
            </tr>
        {/strip}
        {/foreach}
        </tbody>
    </table>
{/block}