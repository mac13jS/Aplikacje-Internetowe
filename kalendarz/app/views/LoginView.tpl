{extends file="main.tpl"}

{block name=top}
    <form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
        <legend>Logowanie do systemu</legend>
        <fieldset>
            <div class="pure-control-group">
                <label for="id_login">Login: </label>
                <input id="id_login" type="text" name="login" value="{$form->login}"/>
            </div>
            <div class="pure-control-group">
                <label for="id_pass">Hasło: </label>
                <input id="id_pass" type="password" name="password"/><br/>
            </div>
            <div class="pure-controls">
                <input type="submit" value="Zaloguj" class="pure-button pure-button-primary"/>
                <a href="{$conf->action_root}signinShow" class="pure-button">Zarejestruj</a>
            </div>
        </fieldset>
    </form>	
{/block}