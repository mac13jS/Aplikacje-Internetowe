{extends file="main.tpl"}

{block name=top}
    <div class="bottom-margin">
        <form action="{$conf->action_root}seriesSave" method="post" class="pure-form pure-form-aligned">
            <fieldset>
                <legend>Dane serii</legend>
                <div class="pure-control-group">
                    <label for="name">Nazwa</label>
                    <input id="name" type="text" placeholder="nazwa" name="name" value="{$form->name}">
                </div>
                <div class="pure-controls">
                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                    <a class="pure-button button-secondary" href="{$conf->action_root}series">Powrót</a>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="{$form->id}">
        </form>	
    </div>
{/block}