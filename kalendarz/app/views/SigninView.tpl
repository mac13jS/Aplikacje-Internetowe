{extends file="main.tpl"}

{block name=top}
    <form action="{$conf->action_root}signin" method="post" class="pure-form pure-form-aligned bottom-margin">
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
            <div class="pure-control-group">
                <label for="id_pass_repeat">Powtórz hasło: </label>
                <input id="id_pass_repeat" type="password" name="password_repeat"/><br/>
            </div>
            <div class="pure-controls">
                <input type="submit" value="Zarejestruj" class="pure-button pure-button-primary"/>
                <a href="{$conf->action_root}loginShow" class="pure-button">Zaloguj</a>
            </div>
        </fieldset>
    </form>	
{/block}