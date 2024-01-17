{extends file="main.tpl"}

{block name=top}
    <div class="bottom-margin">
        <form action="{$conf->action_root}manageSave" method="post" class="pure-form pure-form-aligned">
            <fieldset>
                <legend>Dane użytkownika</legend>
                <div class="pure-control-group">
                    <label for="login">Login</label>
                    <input id="login" type="text" placeholder="login" name="login" value="{$form->login}">
                </div>
                <div class="pure-control-group">
                    <label for="role">Rola użytkownika</label>
                    <select name="role">
                        {foreach from=$roles item=role}
                            <option value={$role["id_role"]}>{$role["name"]}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="pure-controls">
                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                    <a class="pure-button button-secondary" href="{$conf->action_root}manage">Powrót</a>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="{$form->id}">
        </form>	
    </div>

    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Rola</th>
            <th>Data dodania</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
    {foreach $userRoles as $r}
    {strip}
        <tr>
            <td><a class="series">{$r["name"]}</a></td>
            <td><a class="series">{$r["access_date"]}</a></td>
            <td>
                <a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć rolę użytkownikowi?', '{$conf->action_root}manageDelete/{$r['id_role']}')">Usuń</a>
            </td>
        </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>
{/block}